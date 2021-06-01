<?php
namespace Controllers;

class AuthController extends BaseController {
    protected \SessionManager $sessionManager;
    public function __construct(\SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    public function login() {
        return $this->view('login');
    }

    public function doLogin() {
        $this->sessionManager->start();
        $this->sessionManager->set('user', 'abc');
        return $this->response->redirect('/');
    }

    public function logout() {
        $this->sessionManager->destroy();
        return $this->response->redirect('/');
    }
}