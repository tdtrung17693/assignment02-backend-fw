<?php
namespace Middleware;

use Request;

interface IMiddleware {
    function handle(Request $request, callable $function);
}