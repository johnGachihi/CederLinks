<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $this->hasMemberPrivileges($request->user())) {
            return $next($request);
        } else {
            throw new AuthenticationException('Unauthenticated', [], '/#login');
        }
    }

    private function hasMemberPrivileges($user)
    {
        $userRole = $user->type;
        return $userRole === 'member' || $userRole === 'admin' || $userRole === 'superadmin';

    }
}
