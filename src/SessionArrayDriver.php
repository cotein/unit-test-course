<?php  

namespace Coto;

class SessionArrayDriver implements SessionDriverInterface
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function load()
    {
        return $this->data;
    }
}
