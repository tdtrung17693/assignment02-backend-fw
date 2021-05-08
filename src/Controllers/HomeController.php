<?php
namespace Controllers;

use Authenticator;
use Database;
use Request;

class HomeController extends BaseController {
    protected Authenticator $auth;
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager  $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index() {
        return $this->view('index');
    }

    public function aboutUs() {
        return $this->view('aboutus');
    }
}