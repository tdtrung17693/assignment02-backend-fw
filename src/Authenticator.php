<?php

class Authenticator {
    protected SessionManager $sessionManager;
    protected Database $database;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    public function login() {}
    public function logout() {}
}