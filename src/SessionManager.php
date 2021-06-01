<?php

class SessionManager
{
    public function __construct()
    {
        if (!$this->hasSession()) return;

        $this->cleanFlash();
    }

    protected function cleanFlash()
    {
        foreach ($_SESSION as $key => $value) {
            if (strpos($key, "flashSession") === 0) {
                unset($_SESSION[$key]);
            }
        }
    }

    public function start()
    {
        session_start();
    }

    public function set($key, $value)
    {
        if (!isset($_SESSION)) return;
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = false)
    {
        return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
    }

    public function flash($key, $value) {
        $this->set("flashSession:$key", $value);
    }

    public function hasFlash($key) {
        return array_key_exists("flashSession:$key", $_SESSION);
    }

    public function getFlash($key) {
        return $_SESSION["flashSession:$key"];
    }

    public function destroy()
    {
        session_destroy();
    }

    public function hasSession()
    {
        return isset($_SESSION);
    }
}
