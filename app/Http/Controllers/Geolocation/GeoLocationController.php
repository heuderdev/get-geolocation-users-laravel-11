<?php

namespace App\Http\Controllers\Geolocation;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeoLocationResource;
use App\Models\GeolocationData;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MaxMind\Db\Reader\InvalidDatabaseException;

class GeoLocationController extends Controller
{
    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function index(Request $request): JsonResponse
    {

        $records = GeolocationData::orderBy('id', 'desc')->get();
        $resources = $records->map(function ($record) {
            return new GeoLocationResource($record);
        });
        return response()->json($resources);
    }

    /**
     * @throws AddressNotFoundException
     * @throws InvalidDatabaseException
     */
    public function capture(Request $request): GeoLocationResource|JsonResponse
    {
        $ipAddress = $request->ip();
        if (!$ipAddress || $ipAddress == '127.0.0.1') {
            return response()->json(['message' => 'IP address not provided'], 400);
        }
        $reader = new Reader(storage_path('app/GeoLite2-City.mmdb'));
        $record = $reader->city($ipAddress);

        Log::debug($record->jsonSerialize());
        $cadastrado = GeolocationData::create(['data' => $record]);

        return new GeoLocationResource($cadastrado);
    }
}
