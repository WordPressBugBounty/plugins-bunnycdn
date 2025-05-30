<?php

// bunny.net WordPress Plugin
// Copyright (C) 2024-2025 BunnyWay d.o.o.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
declare(strict_types=1);

namespace Bunny\Wordpress\Admin\Controller;

use Bunny\Wordpress\Admin\Container;
use Bunny\Wordpress\Api\Config as ApiConfig;
use Bunny\Wordpress\Api\Exception\AuthorizationException;
use Bunny\Wordpress\Api\Exception\NotFoundException;
use Bunny\Wordpress\Config\Cdn as CdnConfig;

class Cdn implements ControllerInterface
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function run(bool $isAjax): void
    {
        $showSuccess = false;
        $error = null;
        $config = $this->container->getCdnConfig();
        try {
            $showCdnAccelerationAlert = $this->container->getCdnAcceleration()->shouldShowAlert();
            $isRequestAccelerated = $this->container->getCdnAcceleration()->isRequestAccelerated();
            $showApiKeyAlert = false;
        } catch (AuthorizationException $e) {
            $showCdnAccelerationAlert = false;
            $isRequestAccelerated = false;
            $showApiKeyAlert = true;
        } catch (\Exception $e) {
            $showCdnAccelerationAlert = false;
            $showApiKeyAlert = false;
            $isRequestAccelerated = $config->isAccelerated();
            $error = 'The Bunny API is currently unavailable. Some configurations cannot be changed at the moment.';
        }
        if (!empty($_GET['perform']) && 'get-pullzones' === $_GET['perform']) {
            $url = sanitize_url($_GET['url'] ?? site_url(), ['http', 'https']);
            $url = $this->container->getWizardUtils()->normalizeUrl($url);
            $pullzones = [];
            foreach ($this->container->getApiClient()->listPullzones() as $matchingPullzone) {
                if ($matchingPullzone->getOriginUrl() === $url) {
                    $pullzones[] = ['id' => $matchingPullzone->getId(), 'name' => $matchingPullzone->getName()];
                }
            }
            wp_send_json_success(['pullzones' => $pullzones]);

            return;
        }
        if (!empty($_POST)) {
            check_admin_referer('bunnycdn-save-cdn');
            if (isset($_POST['perform']) && 'acceleration-enable' === $_POST['perform']) {
                if (!$isRequestAccelerated) {
                    wp_send_json_error(['message' => 'You cannot enable the CDN acceleration mode if your website is not using Bunny DNS.']);

                    return;
                }
                try {
                    $this->container->getCdnAcceleration()->enable();
                    wp_send_json_success(['message' => 'The CDN acceleration was enabled.']);
                } catch (\Exception $e) {
                    wp_send_json_error(['message' => $e->getMessage()]);
                }

                return;
            }
            if (isset($_POST['perform']) && 'acceleration-disable' === $_POST['perform']) {
                if ($isRequestAccelerated) {
                    wp_send_json_error(['message' => 'You cannot disable the CDN acceleration mode while your website is using Bunny DNS.']);

                    return;
                }
                $url = strlen($_POST['url']) > 0 ? esc_url_raw($_POST['url']) : site_url();
                $pullzoneId = -1;
                if (isset($_POST['pullzone_id'])) {
                    $pullzoneId = (int) sanitize_key($_POST['pullzone_id']);
                }
                try {
                    $this->container->getCdnAcceleration()->disable($url, $pullzoneId);
                    wp_send_json_success(['message' => 'The CDN acceleration was disabled.']);
                } catch (\Exception $e) {
                    wp_send_json_error(['message' => $e->getMessage()]);
                }

                return;
            }
            if (!$config->isAccelerated()) {
                $postData = $_POST['cdn'] ?? [];
                if (!empty($postData['hostname'])) {
                    $postData['hostname'] = $this->container->sanitizeHostname($postData['hostname']);
                }
                $config->handlePost($postData);
                $config->saveToWpOptions();
                // save CORS configuration
                $corsExtensions = $postData['cors_extensions'] ?? [];
                $corsExtensions = array_map(fn ($item): string => trim($item), $corsExtensions);
                $corsExtensions = array_filter($corsExtensions, fn ($item): bool => strlen($item) > 0);
                $corsExtensions = array_unique($corsExtensions);
                try {
                    $pullzoneId = $config->getPullzoneId();
                    if (null !== $pullzoneId) {
                        $this->container->getApiClient()->savePullzoneDetails($pullzoneId, ['EnableAccessControlOriginHeader' => '1' === ($postData['add_cors_headers'] ?? '0'), 'AccessControlOriginHeaderExtensions' => $corsExtensions]);
                    }
                } catch (\Exception $e) {
                    $error = 'The Bunny API is currently unavailable. Some configurations were not saved.';
                }
            }
            $showSuccess = true;
            $apiKey = $this->container->sanitizeApiKey($_POST['cdn']['api_key'] ?? '');
            if (!empty($apiKey)) {
                $error = $this->saveApiKey($apiKey, $config);
                if (null === $error) {
                    $this->container->redirectToSection('cdn');

                    return;
                }
            }
        }
        if ($config->isAccelerated()) {
            $pullzones = [];
            $url = null;
            if (!$config->isAgencyMode() && !$isRequestAccelerated) {
                $url = site_url();
                try {
                    foreach ($this->container->getApiClient()->listPullzones() as $matchingPullzone) {
                        if ($matchingPullzone->getOriginUrl() === $url) {
                            $pullzones[] = $matchingPullzone;
                        }
                    }
                } catch (AuthorizationException $e) {
                    // noop
                } catch (\Exception $e) {
                    $error = 'The Bunny API is currently unavailable. Some configurations cannot be changed at the moment.';
                }
            }
            $this->container->renderTemplateFile('cdn.accelerated.php', ['config' => $config, 'error' => $error, 'isAccelerated' => $isRequestAccelerated, 'showApiKeyAlert' => $showApiKeyAlert, 'showCdnAccelerationAlert' => $showCdnAccelerationAlert, 'showSuccess' => $showSuccess, 'pullzones' => $pullzones, 'resetUrlSafe' => $this->container->getSectionUrl('reset'), 'url' => $url], ['cssClass' => 'cdn']);

            return;
        }
        $pzDetails = null;
        $hostnameWarning = null;
        if ($config->isAgencyMode()) {
            $hostnames = [$config->getHostname()];
            $hostnameWarning = 'There is no API key configured, so the hostname cannot be changed.';
        } else {
            $pullzoneId = $config->getPullzoneId();
            if (null === $pullzoneId) {
                $hostnames = [$config->getHostname()];
                $hostnameWarning = 'Could not find the associated pullzone.';
            } else {
                try {
                    $pzDetails = $this->container->getApiClient()->getPullzoneDetails($pullzoneId);
                    $hostnames = $pzDetails->getHostnames();
                } catch (NotFoundException $e) {
                    $pzDetails = null;
                    $hostnames = [$config->getHostname()];
                    $hostnameWarning = 'Unable to reach the Bunny API to retrieve the hostnames';
                    $error = 'The associated pullzone does not exist any longer. Please double check your configuration.';
                } catch (\Exception $e) {
                    $hostnames = [$config->getHostname()];
                    $hostnameWarning = 'Unable to reach the Bunny API to retrieve the hostnames';
                }
            }
        }
        $this->container->renderTemplateFile('cdn.config.php', ['config' => $config, 'error' => $error, 'hostnames' => $hostnames, 'hostnameWarning' => $hostnameWarning, 'pzDetails' => $pzDetails, 'showApiKeyAlert' => $showApiKeyAlert, 'showCdnAccelerationAlert' => $showCdnAccelerationAlert, 'showSuccess' => $showSuccess, 'suggestAcceleration' => $config->isEnabled() && $isRequestAccelerated], ['cssClass' => 'cdn']);
    }

    private function saveApiKey(string $apiKey, CdnConfig $config): ?string
    {
        $api = $this->container->newApiClient(new ApiConfig($apiKey));
        try {
            // checks if API key is valid
            $user = $api->getUser();
            // checks if API key has access to the configured pullzone
            $pullzoneId = $config->getPullzoneId();
            if (null === $pullzoneId) {
                $pullzone = $api->findPullzoneByName($config->getPullzoneName());
            } else {
                $pullzone = $api->getPullzoneById($pullzoneId);
            }
            update_option('bunnycdn_api_user', $user);
            update_option('bunnycdn_api_key', $apiKey);
            if ($config->isAgencyMode()) {
                update_option('bunnycdn_wizard_mode', 'standalone');
                update_option('bunnycdn_cdn_pullzone', ['id' => $pullzone->getId(), 'name' => $pullzone->getName()]);
            }
        } catch (NotFoundException $e) {
            return 'The API key does not have access to the configured pullzone.';
        } catch (\Bunny_WP_Plugin\GuzzleHttp\Exception\ClientException $e) {
            if (401 === $e->getResponse()->getStatusCode()) {
                return 'Invalid API key';
            }
            $data = json_decode($e->getResponse()->getBody()->getContents());
            if (\JSON_ERROR_NONE === json_last_error() && is_array($data) && isset($data['Message'])) {
                return $data['Message'];
            }

            return 'Could not validate the API key';
        } catch (\Exception $e) {
            return 'Could not validate the API key';
        }

        return null;
    }
}
