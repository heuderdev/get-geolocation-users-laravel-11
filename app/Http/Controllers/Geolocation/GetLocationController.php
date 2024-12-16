<?php

namespace App\Http\Controllers\Geolocation;

use App\External\LocationExternal;
use App\Http\Controllers\Controller;
use App\Models\GeoLocation;

class GetLocationController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $ip = request()->ip();
        $_response = LocationExternal::find($ip);

//        GeoLocation::query()->create([
//            'ip_id' => 201,
//            'ip' => $ip,
//            'city' => $_response['city'],
//            'region' => $_response['region'],
//            'country' => $_response['country'],
//            'loc' => $_response['loc'],
//            'org' => $_response['org'],
//            'postal' => $_response['postal'],
//            'timezone' => $_response['timezone']
//        ]);

        return response()->json($_response);
    }

    public function show(): \Illuminate\Http\JsonResponse
    {
        return response()->json(GeoLocation::query()->where('ip_id', 201)->get());
    }

}
