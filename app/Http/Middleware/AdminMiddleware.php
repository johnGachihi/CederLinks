<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $this->isAdmin($request->user())) {
            return $next($request);
        } else {
            throw new AuthenticationException('Unauthenticated', [], '/#login');
        }
    }

    private function isAdmin($user) {
        return $user->type !== 'admin' || $user->type !== 'superadmin';
    }
}
