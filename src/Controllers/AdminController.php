<?php

namespace Controllers;

class AdminController extends BaseController
{
    public function __construct(\SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }
    public function index()
    {
        return $this->response->redirect('/admin/products');
    }

    public function login()
    {
        $this->sessionManager->start();
        return "login";
    }

    public function logout()
    {
        $this->sessionManager->destroy();
        return $this->response->redirect('/');
    }
}