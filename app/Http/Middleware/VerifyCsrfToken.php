<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        if($request->method() == 'POST' || $request->method() == 'PUT') {
            return $next($request);
        }
        if ($request->method() == 'GET' || $this->tokensMatch($request))
        {
            return $next($request);
        }
        throw new TokenMismatchException;
    }
}
