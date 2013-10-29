<?php

namespace Exercise\Sendgrid\Common;

use Guzzle\Service\Client;

class AbstractClient extends Client
{
    public function __call($method, $args)
    {
        $realMethod = $method;
        if (substr($method, 0, 3) === 'get') {
            $realMethod = substr($method, 3);
        }

        return parent::__call(ucfirst($realMethod), $args);
    }
}
