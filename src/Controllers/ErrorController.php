<?php
namespace Controllers;

class ErrorController extends BaseController {
    public function error_404() {
        $this->setStatusCode(404);
        return $this->view('error-404');
    }
}