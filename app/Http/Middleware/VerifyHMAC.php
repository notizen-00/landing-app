<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyHMAC
{
    public function handle(Request $request, Closure $next)
    {
        $secret = 'dipta-ganteng'; // Ganti dengan kunci rahasia yang sama antara pengirim dan penerima

        // Mendapatkan signature dari header
        $receivedSignature = $request->header('X-Signature');

        // Mendapatkan pesan (body permintaan)
        $message = $request->getContent();

        // Membuat tanda tangan berdasarkan pesan dan kunci rahasia
        $expectedSignature = hash_hmac('sha256', $message, $secret);

        // Membandingkan signature yang diterima dengan yang diharapkan
        if ($receivedSignature !== $expectedSignature) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}