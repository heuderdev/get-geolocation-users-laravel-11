<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\StoreIpJob;
use App\Models\Short;
use App\Services\ShortServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $shorts = Short::with(['ips', 'ips.geolocation'])->where('user_id', Auth::id())->simplePaginate(1);

        return response()->json($shorts);
    }

    public function redirect_url(Request $request): RedirectResponse|JsonResponse
    {
        $shortUrl = $request->route('short_id');

        $short = Short::where('short_url', $shortUrl)->first();


        if (!$short) {
            return response()->json(['message' => 'short not exists']);
        }
        $ip = request()->ip();

        StoreIpJob::dispatch($short->id, $ip);

        if (now()->greaterThan($short->expiration_date)) {
            return response()->json(['message' => 'short expiration']);
        }

        if ($short->deleted_at !== null) {
            return response()->json(['message' => 'short deleted']);
        }

        $short->increment('number_visits');

        return redirect()->to($short->original_url);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'original_url' => 'required|website',
            'expiration_date' => 'date',
            'content' => 'required'
        ]);

        $user_id = Auth::id();
        $created_short = ShortServices::store($request->all(), $user_id);


        return response()->json($created_short);
    }
}
