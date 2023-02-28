<?php

use Coto\Authtenticator;
use Coto\SessionManager;
use Coto\SessionArrayDriver;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;
use Coto\AccessHandler as Access;
use Coto\AuthtenticatorInterface;
use Coto\Stubs\AuthtenticatorStub;

class AccessHandlertest extends PHPUnit_Framework_TestCase
{
    protected function tearDown() :void
    {
        Mockery::close();
    }

    public function test_grant_access()
    {
        
        $access = new Access($this->getAuthtenticatorMock());

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $access = new Access($this->getAuthtenticatorMock());

        $this->assertFalse(
            $access->check('editor')
        );
    }

    public function getAuthtenticatorMock()
    {
        $user = Mockery::mock(User::class);

        $user->role = 'admin';

        $auth = Mockery::mock(AuthtenticatorInterface::class);
        
        $auth->shouldReceive('check')
            ->once()
            ->andReturn(true);

        $auth->shouldReceive('user')
            ->once()
            ->andReturn($user);

        return $auth;
    }

    
}
