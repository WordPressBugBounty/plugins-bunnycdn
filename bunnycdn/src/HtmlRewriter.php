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

namespace Bunny\Wordpress;

use Bunny\Wordpress\Config\Cdn as CdnConfig;
use Bunny\Wordpress\Config\Exception\PluginNotConfiguredException;
use Bunny\Wordpress\Config\Fonts as FontsConfig;

class HtmlRewriter
{
    private CdnConfig $cdnConfig;
    private FontsConfig $fontsConfig;

    public function __construct(CdnConfig $cdnConfig, FontsConfig $fontsConfig)
    {
        $this->cdnConfig = $cdnConfig;
        $this->fontsConfig = $fontsConfig;
    }

    public static function register(): void
    {
        try {
            // no container, as this is loaded in the frontend
            $cdnConfig = CdnConfig::fromWpOptions();
            $fontsConfig = FontsConfig::fromWpOptions();
        } catch (PluginNotConfiguredException $e) {
            return;
        }
        if (!$fontsConfig->isEnabled() && !$cdnConfig->isEnabled()) {
            return;
        }
        add_action('template_redirect', function () use ($cdnConfig, $fontsConfig) {
            $rewriter = new self($cdnConfig, $fontsConfig);
            ob_start([$rewriter, 'rewrite']);
        });
        add_filter('wp_resource_hints', function ($urls, $relation_type) use ($cdnConfig, $fontsConfig) {
            if ('preconnect' !== $relation_type) {
                return $urls;
            }
            if ($cdnConfig->isEnabled()) {
                $scheme = is_ssl() ? 'https' : 'http';
                $urls[] = $scheme.'://'.$cdnConfig->getHostname();
            }
            if ($fontsConfig->isEnabled()) {
                $urls[] = 'https://fonts.bunny.net';
            }

            return $urls;
        }, 10, 2);
    }

    public function rewrite(string $html): string
    {
        if ($this->fontsConfig->isEnabled()) {
            $html = $this->rewriteFonts($html);
        }
        if ($this->cdnConfig->isEnabled()) {
            $html = $this->rewriteCdn($html);
        }

        return $html;
    }

    private function rewriteFonts(string $html): string
    {
        // fonts.googleapis.com
        $result = preg_replace('/(<link\\s+(?:[^>]*?\\s+)?href=(?:\'|"))(https?:|)(\\/\\/fonts\\.googleapis\\.com)((?:[^\'"]*)(?:\'|")(?:.*)+(?:\\/>|>))/i', '$1https://fonts.bunny.net$4', $html);
        if (null === $result) {
            trigger_error('bunnycdn: failed to replace Fonts URLs', \E_USER_WARNING);

            return $html;
        } else {
            $html = $result;
        }
        // fonts.gstatic.com
        $result = preg_replace('/(<link\\s+(?:[^>]*?\\s+)?href=(?:\'|"))(https?:|)(\\/\\/fonts\\.gstatic\\.com)((?:[^\'"]*)(?:\'|")(?:.*)+(?:\\/>|>))/i', '$1https://fonts.bunny.net$4', $html);
        if (null === $result) {
            trigger_error('bunnycdn: failed to replace Fonts URLs', \E_USER_WARNING);

            return $html;
        }

        return $result;
    }

    private function rewriteCdn(string $html): string
    {
        if (is_admin_bar_showing() && $this->cdnConfig->isDisableAdmin()) {
            return $html;
        }
        $scheme = is_ssl() ? 'https' : 'http';
        $originalUrl = $this->cdnConfig->getUrl();
        $newUrl = $scheme.'://'.$this->cdnConfig->getHostname();
        $regexOriginalUrl = preg_quote($this->cdnConfig->getUrl(), '#');
        $directories = implode('|', array_map(fn ($item) => preg_quote($item, '#'), $this->cdnConfig->getIncluded()));
        $escapedOriginalUrl = str_replace('/', '(?:\\\\/)', $regexOriginalUrl);
        $escapedIncludedDirs = str_replace('/', '(?:\\\\/)', $directories);
        $regexSimple = '#(?<=[(\\"\'])(?:'.$regexOriginalUrl.')?/(?:((?:'.$directories.')[^\\"\')]+)|([^/\\"\']+\\.[^/\\"\')]+))(?=[\\"\')])#';
        $regexEscaped = '#(?<=[(\\"\'])(?:'.$escapedOriginalUrl.')?(?:\\\\/)(?:((?:'.$escapedIncludedDirs.')[^\\"\')]+)|([^/\\"\']+\\.[^/\\"\')]+))(?=[\\"\')])#';
        $result = preg_replace_callback($regexEscaped, function (array $item) use ($originalUrl, $newUrl) {
            return $this->rewriteUrl($item, str_replace('/', '\\/', $originalUrl), str_replace('/', '\\/', $newUrl));
        }, $html);
        if (null === $result) {
            trigger_error('bunnycdn: failed to replace CDN URLs', \E_USER_WARNING);

            return $html;
        }
        $html = $result;
        $result = preg_replace_callback($regexSimple, function (array $item) use ($originalUrl, $newUrl) {
            return $this->rewriteUrl($item, $originalUrl, $newUrl);
        }, $html);
        if (null === $result) {
            trigger_error('bunnycdn: failed to replace CDN URLs', \E_USER_WARNING);

            return $html;
        }

        return $result;
    }

    /**
     * @param string[] $asset
     */
    private function rewriteUrl(array $asset, string $originalUrl, string $newUrl): string
    {
        if (3 === count($asset)) {
            return $asset[0];
        }
        $url = $asset[0];
        if ($this->isUrlExcluded($url)) {
            return $url;
        }
        if (str_contains($url, ' ')) {
            return $this->handleSrcset($url, $originalUrl, $newUrl);
        }

        return str_replace($originalUrl, $newUrl, $url);
    }

    private function isUrlExcluded(string $url): bool
    {
        $pos = strpos($url, '?');
        if (false !== $pos) {
            $url = substr($url, 0, $pos);
        }
        $uri = str_replace($this->cdnConfig->getUrl(), '', $url);
        if ($uri === $url) {
            return false;
        }

        return bunnycdn_is_path_excluded($uri, $this->cdnConfig->getExcluded(), true);
    }

    private function handleSrcset(string $url, string $originalUrl, string $newUrl): string
    {
        $sets = explode(',', $url);
        $newSets = [];
        foreach ($sets as $set) {
            $set = trim($set);
            if (str_contains($set, ' ')) {
                [$imgUrl, $imgDescriptor] = explode(' ', $set, 2);
            } else {
                $imgUrl = $set;
                $imgDescriptor = null;
            }
            $imgUrl = trim($imgUrl);
            if (!$this->isUrlExcluded($imgUrl)) {
                $imgUrl = str_replace($originalUrl, $newUrl, $imgUrl);
            }
            $newSets[] = $imgUrl.(null === $imgDescriptor ? '' : ' '.trim($imgDescriptor));
        }

        return implode(', ', $newSets);
    }
}
