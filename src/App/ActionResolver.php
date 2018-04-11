<?php

namespace App;

use Polus\Adr\Interfaces\ResolverInterface;
use Web\Responder\NullResponder;

class ActionResolver implements ResolverInterface
{
    public function resolveDomain($domain): callable
    {
        if (is_callable($domain)) {
            return $domain;
        }
        if (is_string($domain) && class_exists($domain)) {
            return new $domain();
        }
        return null;
    }

    public function resolveInput($input): callable
    {
        if (is_callable($input)) {
            return $input;
        }
        if (is_string($input) && class_exists($input)) {
            return new $input();
        }
        return null;
    }

    public function resolveResponder($responder): callable
    {
        if (is_callable($responder)) {
            return $responder;
        }
        if (is_string($responder) && class_exists($responder)) {
            return new $responder();
        }
        return new NullResponder();
    }
}