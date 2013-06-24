<?php
/**
 * ScmStats
 * Copyright (c) Pause Productions Inc.
 *
 * Config for the development enviroment.
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */
use Silex\Provider\MonologServiceProvider;

// include the prod configuration
require __DIR__ . '/prod.php';

// enable the debug mode
$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../silex.log',
));
