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
     * @param  Request     $request
     * @param  Application $app
     *
     * @return string
     */
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array());
    }

    // /**
    //  * Action to handle errors
    //  *
    //  * @param  \Exception $e
    //  * @param             $code
    //  *
    //  * @return Symfony\Component\HttpFoundation\Response
    //  */
    // public function errorAction(\Exception $e, $code)
    // {
    //     die(var_dump($code)));

    //     if ($app['debug']) {
    //         return;
    //     }

    //     $page = 404 == $code ? '404.html.twig' : '500.html.twig';

    //     return new Response($app['twig']->render($page, array('code' => $code)), $code);
    // }
}
