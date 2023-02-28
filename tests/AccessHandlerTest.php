<?php

use Coto\AccessHandler as Access;
use Coto\Authtenticator;
use Coto\SessionFileDriver;
use Coto\SessionManager;
use PHPUnit\Framework\TestCase;

class AccessHandlertest extends TestCase
{
    public function test_grant_access()
    {
        $driver = new SessionFileDriver();

        $session = new SessionManager($driver);

        $auth = new Authtenticator($session);

        $access = new Access($auth);

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $driver = new SessionFileDriver();

        $session = new SessionManager($driver);

        $auth = new Authtenticator($session);

        $access = new Access($auth);

        $this->assertFalse(
            $access->check('editor')
        );
    }

    
}
