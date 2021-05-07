<?php
namespace Controllers;

use Response;

abstract class BaseController {
    protected Response $response;

    protected function view($viewName, $viewArgs = []) {
        $appConfig = require __DIR__ . "/../config/app.php";
        ob_start();
        extract($viewArgs);
        require_once $appConfig['VIEWS_PATH'] . DIRECTORY_SEPARATOR . str_replace('.', DIRECTORY_SEPARATOR, $viewName) . '.php';
        $content = ob_get_clean();
        $this->response->setContent($content);
        return $this->response;
    }

    protected function setStatusCode($statusCode)
    {
        $this->response->setStatusCode($statusCode);
    }

    /**
     * Call by matched route to initialize response
     *
     * @return void
     */
    public function init()
    {
        $this->response = new Response;
    }
}