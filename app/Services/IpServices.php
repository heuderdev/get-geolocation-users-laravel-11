<?php

namespace App\Services;

use App\External\LocationExternal;
use App\Models\GeoLocation;
use App\Models\Ip;
use Illuminate\Support\Facades\Log;


class IpServices
{
    public static function store($id, $ip)
    {
        $created_ip = Ip::query()->create([
            'short_id' => $id,
            'address_ip' => $ip
        ]);

        $geo_location = LocationExternal::find($ip);

//        Log::debug($geo_location);
        Log::channel('custom_date_hour')->debug($geo_location);

        GeoLocation::query()->create([
            'ip_id' => $created_ip->id,
            'ip' => $geo_location['ip'],
            'city' => $geo_location['city'],
            'region' => $geo_location['region'],
            'country' => $geo_location['country'],
            'loc' => $geo_location['loc'],
            'org' => $geo_location['org'],
            'postal' => $geo_location['postal'],
            'timezone' => $geo_location['timezone']
        ]);

        return $geo_location;
    }
}
