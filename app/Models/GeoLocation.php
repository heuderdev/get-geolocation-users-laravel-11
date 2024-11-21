<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeoLocation extends Model
{
    protected $table = 'geo_locations';
    protected $fillable = ['ip_id', 'ip', 'city', 'region', 'country', 'loc', 'org', 'postal', 'timezone'];

    public function ip(): BelongsTo
    {
        return $this->belongsTo(Ip::class);
    }


}
