<?php

class Application
{
    /**
     * Resolved instances
     *
     * @var array[mix]
     */
    protected static $instance;
    protected $singleton = [];
    protected $resolveInterfaceMap = [];
    protected $resolveClosureMap = [];

    function __construct()
    {
        $this->init();
        static::setInstance($this);
    }

    protected function init()
    {
        $this->appConfig = require_once __DIR__ . "/config/app.php";

        $this->configDatabase();
        $this->configRouting();
        $this->singleton[SessionManager::class] = new SessionManager();
    }

    protected function configRouting()
    {
        $router = new Router($this);
        $this->singleton[Router::class] = $router;

        $router->loadRoutes($this->appConfig['ROUTING_CONFIG_PATH']);
    }

    protected function configDatabase() 
    {
        $dbConfig = new DatabaseConfiguration();
        $dbConfig->host = config('DB_HOST');
        $dbConfig->databaseUser = config('DB_USER');
        $dbConfig->databasePassword = config('DB_PASS');
        $dbConfig->databaseName = config('DB_NAME');
        $this->singleton[Database::class] = new Database($dbConfig);
    }

    function run()
    {
        $this->singleton[SessionManager::class]->start();
        $request = $this->getRequest();
        // Make request object a singleton,
        // so that other components can access the request object through dependency injection
        $this->singleton[Request::class] = $request;
        $router = $this->getRouter();
        try {
            $response = $router->dispatch($request);
        } catch (NotFoundHttpException $e) {
            $response = new Response();
            $response->redirect('/404');
        }
        return $response->sendResponse();
    }

    function registerInterface($name, $instance)
    {
        $this->resolveInterfaceMap[$name] = $instance;
    }

    function registerClosure($name, $closure)
    {
        $this->resolveClosureMap[$name] = $closure;
    }

    static function setInstance($instance) {
        static::$instance = $instance;
    }

    static function getInstance() {
        return static::$instance;
    }

    function resolveClass($className)
    {
        // Find the correspondance in the map first
        if ($this->isSingleton($className)) {
            return $this->singleton[$className];
        } else if ($this->isRegisteredInterface($className)) {
            return $this->createInstance($this->resolveInterfaceMap[$className]);
        }

        try {
            // Then, try to create the instance by autoloading
            return $this->createInstance($className);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    protected function isSingleton($className)
    {
        return array_key_exists($className, $this->singleton);
    }

    protected function isRegisteredInterface($className)
    {
        return array_key_exists($className, $this->resolveInterfaceMap);
    }

    protected function createInstance($className)
    {
        $reflector = new ReflectionClass($className);
        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return $reflector->newInstanceWithoutConstructor();
        }

        $parameters = $constructor->getParameters();
        $arguments = [];

        try {
            foreach ($parameters as $parameter) {
                if (!$parameter->hasType()) {
                    if (!$parameter->isDefaultValueAvailable())
                        throw new ParameterCannotResolvedException($parameter->getName());
                    $argument = $parameter->getDefaultValue();
                } else {
                    try {
                        $argumentType = $parameter->getType();
                        
                        $argument = $this->resolveClass($argumentType->getName());
                    } catch (ClassCannotBeInstantiatedException $exception) {
                        throw new ParameterCannotResolvedException($parameter->getName());
                    }
                }

                array_push(
                    $arguments,
                    $argument
                );
            }
        } catch (ParameterCannotResolvedException $exception) {
            throw new ClassCannotBeInstantiatedException("Class $className cannot be instantiated. Reason: {$exception->getMessage()}");
        }

        return $reflector->newInstanceArgs($arguments);
    }

    protected function getRequest()
    {
        return new Request();
    }

    protected function getRouter(): Router
    {
        return $this->singleton[Router::class];
    }

}
