<?php
/**
 * Created by PhpStorm.
 * User: sunkan
 * Date: 2018-04-11
 * Time: 16:25
 */

namespace App;


use Http\Factory\Diactoros\ResponseFactory;
use Http\Factory\Diactoros\ServerRequestFactory;
use Polus\Adr\Adr;
use Polus\Adr\ResponseHandler\CliResponseHandler;
use Polus\MiddlewareDispatcher\Factory as MiddlewareDispatcherFactory;
use Polus\Router\FastRoute\RouterCollection;
use Polus\Router\FastRoute\Dispatcher as RouteDispatcher;
use Polus\Router\RouterMiddleware;
use Web\Action\IndexAction;

class App
{
    /** @var Adr */
    private $adr;
    /** @var ResponseFactory */
    private $responseFactory;

    public function __construct()
    {
        $this->responseFactory = new ResponseFactory();

        $this->initAdr();
        $this->initRoutes();
    }


    protected function initAdr()
    {
        $middlewareDispatcher = new \Polus\MiddlewareDispatcher\Relay\Dispatcher($this->responseFactory);

        $fastRouterCollection = new \FastRoute\RouteCollector(new \FastRoute\RouteParser\Std(), new \FastRoute\DataGenerator\GroupCountBased());
        $routerDispatcher = new RouteDispatcher(\FastRoute\Dispatcher\GroupCountBased::class, $fastRouterCollection);

        $this->adr = new Adr(
            $this->responseFactory,
            new ActionResolver(),
            new RouterCollection($fastRouterCollection),
            new CliResponseHandler(),
            new MiddlewareDispatcherFactory($middlewareDispatcher, [
                new RouterMiddleware($routerDispatcher),
            ])
        );
    }

    protected function initRoutes()
    {
        $this->adr->get('/', new IndexAction());
    }

    public function run()
    {
        $factory = new ServerRequestFactory();
        return $this->adr->run($factory->createServerRequestFromArray($_SERVER));
    }
}