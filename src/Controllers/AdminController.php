<?php

namespace Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        return $this->view('admin.index');
    }

    public function login()
    {
        return "login";
    }

    public function logout()
    {
        $this->sessionManager->destroy();
        return $this->response->redirect('/');
    }
}