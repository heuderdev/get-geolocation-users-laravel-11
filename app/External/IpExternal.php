<?php

namespace App\External;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class IpExternal
{
    public static function ip(): JsonResponse
    {
        $content = Http::get('https://api.ipify.org', [
            'format' => 'json', // Retorna o IP em formato JSON
        ]);
        if ($content->successful()) {
            $ip = $content->json()['ip']; // Extrai o IP da resposta JSON
            return response()->json($ip);
        } else {
            return response()->json(null);
        }
    }
}
