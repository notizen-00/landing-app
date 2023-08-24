<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && in_array($user->role_id, $roles)) {
            return $next($request);
        }

        return redirect('/login');
    }
}
