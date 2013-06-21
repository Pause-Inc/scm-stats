<?php
/**
 * ScmStast
 * Copyright (c) Pause Productions Inc.
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */

use Symfony\Component\ClassLoader\DebugClassLoader;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;
use Symfony\Component\HttpKernel\Debug\ExceptionHandler;

require_once __DIR__.'/../vendor/autoload.php';

// Brute's method to clear cache.
exec('rm -Rf ../cache');

ini_set('display_errors', 1);
error_reporting(-1);
DebugClassLoader::enable();
ErrorHandler::register();

if ('cli' !== php_sapi_name()) {
    ExceptionHandler::register();
}

$app = require __DIR__.'/../src/app.php';

require __DIR__.'/../config/dev.php';
require __DIR__.'/../src/controllers.php';

$app->run();
