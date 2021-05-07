<?php

use Middleware\IMiddleware;

class Route
{
    protected const REGEX_DELIMITER = '@';
    protected string $controller;
    protected string $action;
    protected Application $container;
    protected string $matchingRegex;
    protected array $middlewares = [];
    protected $params;

    function __construct($urlPattern, $controller, $action, $container)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->container = $container;
        $this->matchingRegex = $this->combineRegex($urlPattern);
    }

    function middleware(IMiddleware $middleware) {
        array_push($this->middlewares, $middleware);
    }

    function runPipeline($request, $middlewareIndex) {
        return $middlewareIndex === count($this->middlewares)
            ? $this->runAction($request)
            : $this->middlewares[$middlewareIndex]->handle($request, function ($payload) use ($request, $middlewareIndex) {
                return $this->runPipeline($payload, $middlewareIndex + 1);
            });
    }

    function runAction() {
        $controller = $this->container->resolveClass($this->controller);
        $controller->init();
        $action = new ReflectionMethod($this->controller, $this->action);
        $actionParameters = $action->getParameters();

        $arguments = [];

        foreach ($actionParameters as $param) {
            $paramName = $param->getName();
            echo $paramName;

            if (!$param->hasType() && !array_key_exists($paramName, $this->params)) {
                throw new Exception("{$this->controller}::{$this->action}() missing parameter $paramName");
            }

            if (!$param->hasType()) {
                array_push($arguments, $this->params[$paramName]);
                continue;
            }

            $paramInstance = $this->container->resolveClass($param->getType()->getName());
            array_push($arguments, $paramInstance);
        }

        return $action->invokeArgs($controller, $arguments);
    }

    function run(Request $request)
    {
        $response = $this->runPipeline($request, 0);

        if (is_string($response)) {
            $responseText=  $response;
            $response = new Response();
            $response->setContent($responseText);
        }

        return $response;
    }

    function match($uri)
    {
        if (preg_match_all($this->matchingRegex, $uri, $match)) {
            array_shift($match);
            foreach(array_combine(array_keys($this->params), $match) as $paramName => $param) {
                $this->params[$paramName] = $param[0];
            }
            
            return true;
        }
        return false;
    }

    protected function combineRegex($uri)
    {
        $startIndex = 0;
        $pattern = preg_quote(str_replace(':', '"', $uri), Route::REGEX_DELIMITER);
        $this->params = [];

        $paramPairs = [];
        
        while ($startIndex = strpos($pattern, '"', $startIndex)) {
            $nextIndex = strpos($pattern, '/', $startIndex + 1);
            
            if ($nextIndex != false) {
                array_push($paramPairs, [$startIndex, $nextIndex]);
                $paramName = substr($pattern, $startIndex + 1, $nextIndex - $startIndex - 1);
                $pattern = substr($pattern, 0, $startIndex) . '(\w+)' . substr($pattern, $nextIndex);
            } else {
                array_push($paramPairs, [$startIndex, null]);
                $paramName = substr($pattern, $startIndex + 1);
                $pattern = substr($pattern, 0, $startIndex) . '(\w+)';
            }
            $this->params[$paramName] = null;
            $startIndex += 5;
        }

        return Route::REGEX_DELIMITER . "^" . $pattern . "$" . Route::REGEX_DELIMITER;
    }
}
