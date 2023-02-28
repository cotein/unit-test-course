<?php

use Coto\Authtenticator;
use Coto\SessionManager;
use Coto\SessionFileDriver;
use PHPUnit\Framework\TestCase;
use Coto\AccessHandler as Access;
use Coto\SessionArrayDriver;
use Coto\Stubs\AuthtenticatorStub;

class AccessHandlertest extends TestCase
{
    public function test_grant_access()
    {
        /* $driver = new SessionArrayDriver([
            'user_data' => [
                'name' => 'Diego',
                'role' => 'admin'
            ]
        ]);

        $session = new SessionManager($driver); */


        $auth = new AuthtenticatorStub();

        $access = new Access($auth);

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $driver = new SessionArrayDriver([
            'user_data' => [
                'name' => 'Diego',
                'role' => 'admin'
            ]
        ]);

        $session = new SessionManager($driver);

        $auth = new Authtenticator($session);

        $access = new Access($auth);

        $this->assertFalse(
            $access->check('editor')
        );
    }

    
}
