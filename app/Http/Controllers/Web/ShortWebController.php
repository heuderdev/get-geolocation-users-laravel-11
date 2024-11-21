<?php

namespace App\Http\Controllers\Web;

use App\External\LocationExternal;
use App\Http\Controllers\Controller;
use App\Models\GeoLocation;
use App\Models\Short;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShortWebController extends Controller
{
    public function index(): Factory|View|Application
    {
        $shorts = Short::with(['ips.geoLocation', 'user'])->get()->toArray();
        return view('shorts', ['shorts' => $shorts]);
    }

    public function test()
    {
        $ip = request()->ip();
        $geo_location = LocationExternal::find($ip);

        return GeoLocation::query()->create([
            'ip_id' => 146,
            'ip' => $geo_location['ip'],
            'city' => $geo_location['city'],
            'region' => $geo_location['region'],
            'country' => $geo_location['country'],
            'loc' => $geo_location['loc'],
            'org' => $geo_location['org'],
            'postal' => $geo_location['postal'],
            'timezone' => $geo_location['timezone']
        ]);

    }
}
