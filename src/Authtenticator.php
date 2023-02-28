<?php

namespace Coto;
use Coto\SessionManager as Session;
use Coto\User;

class Authtenticator
{
    protected $user;
    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    
    public function check()
    {
        return $this->user() != null;
    }

    public function user()
    {
        if ($this->user) {
            return $this->user;
        }

        $data = $this->session->get('user_data');

        if ( ! is_null($data)) {
            
            return $this->user = new User($data);
        }

        return null;
    }
}
