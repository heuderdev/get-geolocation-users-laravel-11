<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ip extends Model
{
    protected $fillable = ['short_id', 'address_ip'];

    public function short(): BelongsTo
    {
        return $this->belongsTo(Short::class);
    }

    public function geolocation(): HasOne
    {
        return $this->hasOne(Geolocation::class);
    }
}
