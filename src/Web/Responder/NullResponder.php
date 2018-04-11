<?php

namespace Web\Responder;

use Aura\Payload_Interface\PayloadInterface;
use Polus\Adr\Interfaces\ResponderInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NullResponder implements ResponderInterface
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        PayloadInterface $payload
    ): ResponseInterface {
        return $response;
    }
}