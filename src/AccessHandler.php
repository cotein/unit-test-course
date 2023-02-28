<?php

namespace Coto;

class AccessHandler
{
    /**
     * @var Coto\Authtenticator
     */
    protected $auth;

    /**
     * @param Coto\Authtenticator $auth
     */
    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function check($role)
    {
        return $this->auth->check() && $this->auth->user()->role == $role;
    }
}

