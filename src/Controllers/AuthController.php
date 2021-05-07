<?php
namespace Controllers;

class AuthController extends BaseController {
    public function login() {
        $this->setStatusCode(404);
        return "login";
    }
}