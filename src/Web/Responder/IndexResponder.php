<?php

namespace Web\Responder;

use Aura\Payload_Interface\PayloadInterface;
use Polus\Adr\Interfaces\ResponderInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexResponder implements ResponderInterface
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        PayloadInterface $payload
    ): ResponseInterface {
        $response->getBody()->write("Index responder\n");
        return $response;
    }
}