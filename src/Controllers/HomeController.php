<?php
namespace Controllers;

use Authenticator;
use Request;

class HomeController extends BaseController {
    protected Authenticator $auth;
    public function __construct()
    {
    }
    public function index() {
        return $this->view('index');
    }
}