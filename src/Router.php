<?php

class Router
{
    protected $routes = [
        'get' => [],
        'post' => [],
        'put' => [],
        'patch' => [],
        'delete' => [],
        'options' => [],
    ];

    function __construct(Application $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function get(string $url, string $controller, string $method)
    {
        return $this->addRoute('get', $url, $controller, $method);
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function post(string $url, string $controller, string $method)
    {
        return $this->addRoute('post', $url, $controller, $method);
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function put(string $url, string $controller, string $method)
    {
        return $this->addRoute('put', $url, $controller, $method);
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function patch(string $url, string $controller, string $method)
    {
        return $this->addRoute('patch', $url, $controller, $method);
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function delete(string $url, string $controller, string $method)
    {
        return $this->addRoute('delete', $url, $controller, $method);
    }

    /**
     * @param string $url Endpoint URL
     * @param string $controller Controller name
     * @param string $method Controller's method name
     */
    public function options(string $url, string $controller, string $method)
    {
        return $this->addRoute('options', $url, $controller, $method);
    }

    public function loadRoutes($routeConfigPath)
    {
        $router = $this;
        require $routeConfigPath;
    }

    public function dispatch(Request $request)
    {
        $route = $this->findMatchedRoute($request);

        if (is_null($route)) throw new NotFoundHttpException;

        return $route->run($request);
    }

    protected function findMatchedRoute(Request $request)
    {
        $requestUri = $request->getRequestUri();
        $requestMethod = $request->getRequestMethod();

        foreach ($this->routes[$requestMethod] as $route) {
            if ($route->match($requestUri)) {
                return $route;
            }
        }

        return null;
    }

    protected function addRoute($httpMethod, $url, $controller, $action) : Route
    {
        $key = $url === '/' ? $url : trim(ltrim($url, '/'));
        $this->routes[$httpMethod][$key] = new Route($url, $controller, $action, $this->container);
        return $this->routes[$httpMethod][$key];
    }
}
