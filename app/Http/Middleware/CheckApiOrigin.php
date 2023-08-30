<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiOrigin
{
    public function handle($request, Closure $next)
    {
        $allowedOrigins = [
            'https://landing-app.test/', // Ubah dengan URL aplikasi Anda
        ];

        if (in_array($request->header('origin'), $allowedOrigins)) {
            return $next($request);
        }

        return response()->json(['message' => 'Forbidden'], 403);
    }
}
