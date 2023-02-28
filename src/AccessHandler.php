<?php

namespace Coto;

class AccessHandler
{
    protected $auth;

    public function __construct(AuthtenticatorInterface $auth)
    {
        $this->auth = $auth;
    }

    public function check($role)
    {
        return $this->auth->check() && $this->auth->user()->role == $role;
    }
}

