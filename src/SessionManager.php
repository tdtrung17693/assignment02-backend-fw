<?php

class SessionManager
{
    public function start()
    {
        session_start();
    }

    public function set($key, $value)
    {
        if (!$_SESSION) return;
    }

    public function get($key, $default = false)
    {
        return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
    }

    public function destroy()
    {
        session_destroy();
    }
}
