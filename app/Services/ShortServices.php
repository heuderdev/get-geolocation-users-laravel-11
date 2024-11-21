<?php

namespace App\Services;

use App\Models\Short;
use Illuminate\Support\Str;

class ShortServices
{

    public static function store($input, $user_id)
    {

        $unique = explode("-", strtoupper(Str::uuid()))[0];

        return Short::query()->create([
            'user_id' => $user_id,
            'content' => $input['content'],
            'original_url' => $input['original_url'],
            'expiration_date' => $input['expiration_date'],
            'short_url' => $unique
        ]);
    }
}
