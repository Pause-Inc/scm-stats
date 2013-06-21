<?php
/**
 * ScmStast
 * Copyright (c) Pause Productions Inc.
 *
 * @author Ryan Kadwell <ryan@pause.ca>
 */

namespace Application\Tests\DefaultTest;

use Silex\WebTestCase;

class DefaultTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../../../src/app.php';

        require __DIR__ . '/../../../config/test.php';
        require __DIR__ . '/../../../src/controllers.php';

        return $app;
    }

    public function testIndexRoute()
    {
        $client  = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
