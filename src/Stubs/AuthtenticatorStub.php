<?php 

namespace Coto\Stubs;

use Coto\AuthtenticatorInterface;
use Coto\User;

class AuthtenticatorStub implements AuthtenticatorInterface
{
    public function check()
    {
        return true;
    }    

    public function user()
    {
        return new User([
            'role' => 'admin'
        ]);
    }
}
