<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $user = auth()->user();

        if ($user && in_array($user->role_id, $role)) {
            return $next($request);
        }

        return redirect()->route('show.login');
    }
}
