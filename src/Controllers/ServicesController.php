<?php
namespace Controllers;

use Authenticator;
use Database;
use Request;

class ServicesController extends BaseController
{
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index()
    {
        return $this->view('services');
    }
}