<?php
namespace Middleware;

use Request;
use Response;

class AuthMiddleware implements IMiddleware {
    public function handle(Request $request, callable $next)
    {
        $response = new Response();
        return $next($request);
    }
}