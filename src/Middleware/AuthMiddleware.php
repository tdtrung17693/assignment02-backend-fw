<?php
namespace Middleware;

use Request;
use Response;

class AuthMiddleware implements IMiddleware {
    protected \SessionManager $sessionManager;
    public function __construct(\SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }
    public function handle(Request $request, callable $next)
    {
        $response = new Response();
        if (!$this->sessionManager->get('LOGGED_IN_USER')) return $response->redirect('/403');
        return $next($request);
    }
}