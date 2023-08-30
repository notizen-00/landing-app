<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function generateApiKey()
{
    $apiKey = ApiKey::create([
        
        'key' => ApiKey::generateKey(),
    ]);

    return response()->json(['api_key' => $apiKey->key]);
}
}
