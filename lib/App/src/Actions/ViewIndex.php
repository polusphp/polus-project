<?php

namespace App\Actions;

use Aura\Router\Map;
use Aura\Router\Route;
use Blueprint\ITemplate as Blueprint;
use Polus\App;
use Polus\Controller\IController;
use Polus\Traits\ResponseTrait;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\HtmlResponse;

class ViewIndex implements IController
{
    use ResponseTrait;

    public static function registerRoutes(Map $map, App $app)
    {
        $map->get('index', '', ViewIndex::class)->alias('/');
    }

    protected $template_engine;

    public function __construct(Blueprint $engine)
    {
        $this->template_engine = $engine;
    }

    public function __invoke(App $app, Request $request, Route $route)
    {
        $this->template_engine->ip = $request->getAttribute('ip_address');
        $html = $this->template_engine->render('index.php');
        return new HtmlResponse($html);
    }
}
