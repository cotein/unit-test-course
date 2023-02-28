<?php 

namespace Coto;

class User
{
    protected $attributes;

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __get($var)
    {
        return isset($this->attributes[$var])
            ? $this->attributes[$var]
            : null;
    }
}
