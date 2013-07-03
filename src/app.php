<?php
/**
 * ScmStast
 * Copyright (c) Pause Productions Inc.
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */

use Assetic\Asset\AssetCache;
use Assetic\Asset\GlobAsset;
use Assetic\Cache\FilesystemCache;
use Assetic\Filter\CssMinFilter;
use Assetic\Filter\LessFilter;
use Assetic\Filter\Yui\CssCompressorFilter;
use Assetic\Filter\Yui\JsCompressorFilter;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use SilexAssetic\AsseticExtension;
use SilexAssetic\AsseticServiceProvider;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path'    => array(__DIR__ . '/../resources/template'),
    'twig.options' => array('cache' => __DIR__.'/../cache')
));

$app->register(new AsseticServiceProvider());

$app['assetic.path_to_web'] = __DIR__ . '/../web';
$app['assetic.options'] = array(
    'debug' => false,
    'auto_dump_assets' => true
);

$app['assetic.filter_manager'] = $app->share(
    $app->extend('assetic.filter_manager', function($fm, $app) {
        $fm->set('yui_css', new CssCompressorFilter(
            __DIR__ . '/../yui-compressor-2.4.7.jar'
        ));
        $fm->set('yui_js', new JsCompressorFilter(
            __DIR__ . '/../yui-compressor-2.4.7.jar'
        ));
        $fm->set('less', new LessFilter(
            '/usr/local/bin/node',
            array('/usr/local/lib/node_modules')
        ));
        return $fm;
    })
);

// only dump assets in dev mode
if ($app['assetic.options']['auto_dump_assets']) {
    $dumper = $app['assetic.dumper'];
    if (isset($app['twig'])) {
        $dumper->addTwigAssets();
    }

    $dumper->dumpAssets();
}

$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
}));

return $app;
