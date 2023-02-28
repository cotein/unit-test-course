<?php

namespace Coto;
use Coto\Authtenticator as Auth;

class AccessHandler
{
    public static function check($role)
    {
        return Auth::check() && Auth::user()->role == $role;
    }
}

