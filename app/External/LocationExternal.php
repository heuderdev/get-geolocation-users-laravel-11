<?php

namespace App\External;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class LocationExternal
{
    public static function find($ip)
    {
        try {
            $content = Http::get('https://ipinfo.io/' . $ip . '?token=87963be65b9eca');

            if ($content->successful()) {
                return $content->json();
            } else {
                return null;
            }

        } catch (\Exception $e) {
            return null;
        }
    }
}
