<?php

// autoload_static.php @generated by Composer
namespace Bunny_WP_Plugin\Composer\Autoload;

class ComposerStaticInitf50a47865fece9c3bc9d1f298b4f6b42
{
    public static $files = array('7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php', '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php', '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php', 'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php', '6457bae8dcb427384e4c3a5f6af154c3' => __DIR__ . '/../..' . '/wp-polyfill.php');
    public static $prefixLengthsPsr4 = array('S' => array('Symfony\\Polyfill\\Php80\\' => 23), 'P' => array('Psr\\Http\\Message\\' => 17, 'Psr\\Http\\Client\\' => 16), 'G' => array('GuzzleHttp\\Psr7\\' => 16, 'GuzzleHttp\\Promise\\' => 19, 'GuzzleHttp\\' => 11), 'B' => array('Bunny\\Wordpress\\' => 16, 'Bunny\\Storage\\' => 14));
    public static $prefixDirsPsr4 = array('Symfony\\Polyfill\\Php80\\' => array(0 => __DIR__ . '/..' . '/symfony/polyfill-php80'), 'Psr\\Http\\Message\\' => array(0 => __DIR__ . '/..' . '/psr/http-factory/src', 1 => __DIR__ . '/..' . '/psr/http-message/src'), 'Psr\\Http\\Client\\' => array(0 => __DIR__ . '/..' . '/psr/http-client/src'), 'GuzzleHttp\\Psr7\\' => array(0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src'), 'GuzzleHttp\\Promise\\' => array(0 => __DIR__ . '/..' . '/guzzlehttp/promises/src'), 'GuzzleHttp\\' => array(0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src'), 'Bunny\\Wordpress\\' => array(0 => __DIR__ . '/../..' . '/src'), 'Bunny\\Storage\\' => array(0 => __DIR__ . '/..' . '/bunnycdn/storage/src'));
    public static $classMap = array('Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php', 'Bunny\\Storage\\AuthenticationException' => __DIR__ . '/..' . '/bunnycdn/storage/src/AuthenticationException.php', 'Bunny\\Storage\\Client' => __DIR__ . '/..' . '/bunnycdn/storage/src/Client.php', 'Bunny\\Storage\\Exception' => __DIR__ . '/..' . '/bunnycdn/storage/src/Exception.php', 'Bunny\\Storage\\FileInfo' => __DIR__ . '/..' . '/bunnycdn/storage/src/FileInfo.php', 'Bunny\\Storage\\FileNotFoundException' => __DIR__ . '/..' . '/bunnycdn/storage/src/FileNotFoundException.php', 'Bunny\\Storage\\InvalidRegionException' => __DIR__ . '/..' . '/bunnycdn/storage/src/InvalidRegionException.php', 'Bunny\\Storage\\Region' => __DIR__ . '/..' . '/bunnycdn/storage/src/Region.php', 'Bunny\\Wordpress\\Admin\\Container' => __DIR__ . '/../..' . '/src/Admin/Container.php', 'Bunny\\Wordpress\\Admin\\Controller\\About' => __DIR__ . '/../..' . '/src/Admin/Controller/About.php', 'Bunny\\Wordpress\\Admin\\Controller\\Attachment' => __DIR__ . '/../..' . '/src/Admin/Controller/Attachment.php', 'Bunny\\Wordpress\\Admin\\Controller\\Cdn' => __DIR__ . '/../..' . '/src/Admin/Controller/Cdn.php', 'Bunny\\Wordpress\\Admin\\Controller\\CdnCachePurge' => __DIR__ . '/../..' . '/src/Admin/Controller/CdnCachePurge.php', 'Bunny\\Wordpress\\Admin\\Controller\\ControllerInterface' => __DIR__ . '/../..' . '/src/Admin/Controller/ControllerInterface.php', 'Bunny\\Wordpress\\Admin\\Controller\\Fonts' => __DIR__ . '/../..' . '/src/Admin/Controller/Fonts.php', 'Bunny\\Wordpress\\Admin\\Controller\\Index' => __DIR__ . '/../..' . '/src/Admin/Controller/Index.php', 'Bunny\\Wordpress\\Admin\\Controller\\Offloader' => __DIR__ . '/../..' . '/src/Admin/Controller/Offloader.php', 'Bunny\\Wordpress\\Admin\\Controller\\Optimizer' => __DIR__ . '/../..' . '/src/Admin/Controller/Optimizer.php', 'Bunny\\Wordpress\\Admin\\Controller\\Overview' => __DIR__ . '/../..' . '/src/Admin/Controller/Overview.php', 'Bunny\\Wordpress\\Admin\\Controller\\Reset' => __DIR__ . '/../..' . '/src/Admin/Controller/Reset.php', 'Bunny\\Wordpress\\Admin\\Controller\\UserData' => __DIR__ . '/../..' . '/src/Admin/Controller/UserData.php', 'Bunny\\Wordpress\\Admin\\Controller\\Wizard' => __DIR__ . '/../..' . '/src/Admin/Controller/Wizard.php', 'Bunny\\Wordpress\\Admin\\Router' => __DIR__ . '/../..' . '/src/Admin/Router.php', 'Bunny\\Wordpress\\Api\\Billing\\Info' => __DIR__ . '/../..' . '/src/Api/Billing/Info.php', 'Bunny\\Wordpress\\Api\\Client' => __DIR__ . '/../..' . '/src/Api/Client.php', 'Bunny\\Wordpress\\Api\\Config' => __DIR__ . '/../..' . '/src/Api/Config.php', 'Bunny\\Wordpress\\Api\\Dnszone\\Info' => __DIR__ . '/../..' . '/src/Api/Dnszone/Info.php', 'Bunny\\Wordpress\\Api\\Dnszone\\Record' => __DIR__ . '/../..' . '/src/Api/Dnszone/Record.php', 'Bunny\\Wordpress\\Api\\Dnszone\\RecordType' => __DIR__ . '/../..' . '/src/Api/Dnszone/RecordType.php', 'Bunny\\Wordpress\\Api\\Exception\\AccountNotActivatedException' => __DIR__ . '/../..' . '/src/Api/Exception/AccountNotActivatedException.php', 'Bunny\\Wordpress\\Api\\Exception\\AuthorizationException' => __DIR__ . '/../..' . '/src/Api/Exception/AuthorizationException.php', 'Bunny\\Wordpress\\Api\\Exception\\InvalidJsonException' => __DIR__ . '/../..' . '/src/Api/Exception/InvalidJsonException.php', 'Bunny\\Wordpress\\Api\\Exception\\NotFoundException' => __DIR__ . '/../..' . '/src/Api/Exception/NotFoundException.php', 'Bunny\\Wordpress\\Api\\Exception\\PullzoneLocalUrlException' => __DIR__ . '/../..' . '/src/Api/Exception/PullzoneLocalUrlException.php', 'Bunny\\Wordpress\\Api\\Pullzone\\Details' => __DIR__ . '/../..' . '/src/Api/Pullzone/Details.php', 'Bunny\\Wordpress\\Api\\Pullzone\\Edgerule' => __DIR__ . '/../..' . '/src/Api/Pullzone/Edgerule.php', 'Bunny\\Wordpress\\Api\\Pullzone\\EdgeruleTrigger' => __DIR__ . '/../..' . '/src/Api/Pullzone/EdgeruleTrigger.php', 'Bunny\\Wordpress\\Api\\Pullzone\\Info' => __DIR__ . '/../..' . '/src/Api/Pullzone/Info.php', 'Bunny\\Wordpress\\Api\\Pullzone\\Statistics' => __DIR__ . '/../..' . '/src/Api/Pullzone/Statistics.php', 'Bunny\\Wordpress\\Api\\Storagezone\\Details' => __DIR__ . '/../..' . '/src/Api/Storagezone/Details.php', 'Bunny\\Wordpress\\Api\\User' => __DIR__ . '/../..' . '/src/Api/User.php', 'Bunny\\Wordpress\\Config\\Cdn' => __DIR__ . '/../..' . '/src/Config/Cdn.php', 'Bunny\\Wordpress\\Config\\Exception\\PluginNotConfiguredException' => __DIR__ . '/../..' . '/src/Config/Exception/PluginNotConfiguredException.php', 'Bunny\\Wordpress\\Config\\Fonts' => __DIR__ . '/../..' . '/src/Config/Fonts.php', 'Bunny\\Wordpress\\Config\\Offloader' => __DIR__ . '/../..' . '/src/Config/Offloader.php', 'Bunny\\Wordpress\\Config\\Optimizer' => __DIR__ . '/../..' . '/src/Config/Optimizer.php', 'Bunny\\Wordpress\\Config\\Reset' => __DIR__ . '/../..' . '/src/Config/Reset.php', 'Bunny\\Wordpress\\Container' => __DIR__ . '/../..' . '/src/Container.php', 'Bunny\\Wordpress\\HtmlRewriter' => __DIR__ . '/../..' . '/src/HtmlRewriter.php', 'Bunny\\Wordpress\\Offloader' => __DIR__ . '/../..' . '/src/Offloader.php', 'Bunny\\Wordpress\\REST\\Controller' => __DIR__ . '/../..' . '/src/REST/Controller.php', 'Bunny\\Wordpress\\Service\\AttachmentCounter' => __DIR__ . '/../..' . '/src/Service/AttachmentCounter.php', 'Bunny\\Wordpress\\Service\\AttachmentMover' => __DIR__ . '/../..' . '/src/Service/AttachmentMover.php', 'Bunny\\Wordpress\\Service\\CdnAcceleration' => __DIR__ . '/../..' . '/src/Service/CdnAcceleration.php', 'Bunny\\Wordpress\\Service\\Exception\\InvalidSQLQueryException' => __DIR__ . '/../..' . '/src/Service/Exception/InvalidSQLQueryException.php', 'Bunny\\Wordpress\\Service\\Exception\\StorageFileAlreadyExistsException' => __DIR__ . '/../..' . '/src/Service/Exception/StorageFileAlreadyExistsException.php', 'Bunny\\Wordpress\\Service\\MigrateExcludedExtensions' => __DIR__ . '/../..' . '/src/Service/MigrateExcludedExtensions.php', 'Bunny\\Wordpress\\Service\\MigrateFromV1' => __DIR__ . '/../..' . '/src/Service/MigrateFromV1.php', 'Bunny\\Wordpress\\Service\\MigrateToWP65' => __DIR__ . '/../..' . '/src/Service/MigrateToWP65.php', 'Bunny\\Wordpress\\Service\\OffloaderSetup' => __DIR__ . '/../..' . '/src/Service/OffloaderSetup.php', 'Bunny\\Wordpress\\Utils\\Number' => __DIR__ . '/../..' . '/src/Utils/Number.php', 'Bunny\\Wordpress\\Utils\\Offloader' => __DIR__ . '/../..' . '/src/Utils/Offloader.php', 'Bunny\\Wordpress\\Utils\\StorageClientFactory' => __DIR__ . '/../..' . '/src/Utils/StorageClientFactory.php', 'Bunny\\Wordpress\\Utils\\Wizard' => __DIR__ . '/../..' . '/src/Utils/Wizard.php', 'Bunny_WP_Plugin\\Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php', 'Bunny_WP_Plugin\\GuzzleHttp\\BodySummarizer' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/BodySummarizer.php', 'Bunny_WP_Plugin\\GuzzleHttp\\BodySummarizerInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/BodySummarizerInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Client' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Client.php', 'Bunny_WP_Plugin\\GuzzleHttp\\ClientInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/ClientInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\ClientTrait' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/ClientTrait.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Cookie\\CookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/CookieJar.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Cookie\\CookieJarInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/CookieJarInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Cookie\\FileCookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/FileCookieJar.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Cookie\\SessionCookieJar' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/SessionCookieJar.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Cookie\\SetCookie' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Cookie/SetCookie.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\BadResponseException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/BadResponseException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\ClientException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ClientException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\ConnectException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ConnectException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\GuzzleException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/GuzzleException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/InvalidArgumentException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\RequestException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/RequestException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\ServerException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/ServerException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\TooManyRedirectsException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/TooManyRedirectsException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Exception\\TransferException' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Exception/TransferException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\HandlerStack' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/HandlerStack.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\CurlFactory' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlFactory.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\CurlFactoryInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlFactoryInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\CurlHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlHandler.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\CurlMultiHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/CurlMultiHandler.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\EasyHandle' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/EasyHandle.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\HeaderProcessor' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/HeaderProcessor.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\MockHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/MockHandler.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\Proxy' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/Proxy.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Handler\\StreamHandler' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Handler/StreamHandler.php', 'Bunny_WP_Plugin\\GuzzleHttp\\MessageFormatter' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/MessageFormatter.php', 'Bunny_WP_Plugin\\GuzzleHttp\\MessageFormatterInterface' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/MessageFormatterInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Middleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Middleware.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Pool' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Pool.php', 'Bunny_WP_Plugin\\GuzzleHttp\\PrepareBodyMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/PrepareBodyMiddleware.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\AggregateException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/AggregateException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\CancellationException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/CancellationException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Coroutine' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Coroutine.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Create' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Create.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Each' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Each.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\EachPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/EachPromise.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\FulfilledPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/FulfilledPromise.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Is' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Is.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Promise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Promise.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\PromiseInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/PromiseInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\PromisorInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/PromisorInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\RejectedPromise' => __DIR__ . '/..' . '/guzzlehttp/promises/src/RejectedPromise.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\RejectionException' => __DIR__ . '/..' . '/guzzlehttp/promises/src/RejectionException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\TaskQueue' => __DIR__ . '/..' . '/guzzlehttp/promises/src/TaskQueue.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\TaskQueueInterface' => __DIR__ . '/..' . '/guzzlehttp/promises/src/TaskQueueInterface.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Promise\\Utils' => __DIR__ . '/..' . '/guzzlehttp/promises/src/Utils.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\AppendStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/AppendStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\BufferStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/BufferStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\CachingStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/CachingStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\DroppingStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/DroppingStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Exception\\MalformedUriException' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Exception/MalformedUriException.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\FnStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/FnStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Header' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Header.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\HttpFactory' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/HttpFactory.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\InflateStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/InflateStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\LazyOpenStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/LazyOpenStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\LimitStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/LimitStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Message' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Message.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\MessageTrait' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/MessageTrait.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\MimeType' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/MimeType.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\MultipartStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/MultipartStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\NoSeekStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/NoSeekStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\PumpStream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/PumpStream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Query' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Query.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Request' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Request.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Response' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Response.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Rfc7230' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Rfc7230.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\ServerRequest' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/ServerRequest.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Stream' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Stream.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\StreamDecoratorTrait' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/StreamDecoratorTrait.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\StreamWrapper' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/StreamWrapper.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\UploadedFile' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UploadedFile.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Uri' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Uri.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\UriComparator' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UriComparator.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\UriNormalizer' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UriNormalizer.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\UriResolver' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/UriResolver.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Psr7\\Utils' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/Utils.php', 'Bunny_WP_Plugin\\GuzzleHttp\\RedirectMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RedirectMiddleware.php', 'Bunny_WP_Plugin\\GuzzleHttp\\RequestOptions' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RequestOptions.php', 'Bunny_WP_Plugin\\GuzzleHttp\\RetryMiddleware' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/RetryMiddleware.php', 'Bunny_WP_Plugin\\GuzzleHttp\\TransferStats' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/TransferStats.php', 'Bunny_WP_Plugin\\GuzzleHttp\\Utils' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/Utils.php', 'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php', 'Bunny_WP_Plugin\\Psr\\Http\\Client\\ClientExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/ClientExceptionInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Client\\ClientInterface' => __DIR__ . '/..' . '/psr/http-client/src/ClientInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Client\\NetworkExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/NetworkExceptionInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Client\\RequestExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/RequestExceptionInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\RequestFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/RequestFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\ResponseFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/ResponseFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\ServerRequestFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/ServerRequestFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\StreamFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/StreamFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\UploadedFileFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/UploadedFileFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\UriFactoryInterface' => __DIR__ . '/..' . '/psr/http-factory/src/UriFactoryInterface.php', 'Bunny_WP_Plugin\\Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php', 'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php', 'Bunny_WP_Plugin\\Symfony\\Polyfill\\Php80\\Php80' => __DIR__ . '/..' . '/symfony/polyfill-php80/Php80.php', 'Bunny_WP_Plugin\\Symfony\\Polyfill\\Php80\\PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/PhpToken.php', 'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php', 'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php');
    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf50a47865fece9c3bc9d1f298b4f6b42::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf50a47865fece9c3bc9d1f298b4f6b42::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf50a47865fece9c3bc9d1f298b4f6b42::$classMap;
        }, null, ClassLoader::class);
    }
}
