<?php
/**
 * ScmStast
 * Copyright (c) Pause Productions Inc.
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */

namespace ScmStats\Tests\Controllers;

use Silex\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../../../../src/app.php';

        require __DIR__ . '/../../../../config/test.php';
        require __DIR__ . '/../../../../src/controllers.php';

        return $app;
    }

    public function testIndexACtionRoute()
    {
        $client  = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
