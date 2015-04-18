<?php
namespace Aura\Router\Rule;

use Aura\Router\Route;
use Psr\Http\Message\ServerRequestInterface;

// must match **at least one** allowed method value
class Allows
{
    /**
     *
     * Does the server request method match an allowed route method?
     *
     * @param ServerRequestInterface $request The HTTP request.
     *
     * @param Route $route The route.
     *
     * @return bool True on success, false on failure.
     *
     */
    public function __invoke(ServerRequestInterface $request, Route $route)
    {
        if (! $route->allows) {
            return true;
        }

        $request_method = $request->getMethod() ?: 'GET';
        return in_array($request_method, $route->allows);
    }
}