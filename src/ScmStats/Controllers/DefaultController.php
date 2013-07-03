<?php
/**
 * ScmStats
 * Copyright (c) Pause Productions Inc.
 */

namespace ScmStats\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

/**
 * Default application controller
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */
class DefaultController
{
    /**
     * Main page
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     * @param Silex\Application                        $app
     *
     * @return string
     */
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array());
    }

    /**
     * Action for adding a new repository
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     * @param Silex\Application                        $app
     */
    public function fetchRepoAction(Request $request, Application $app)
    {

    }
}
