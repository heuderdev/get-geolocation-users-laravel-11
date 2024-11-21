<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Routing\Route;

/**
 * @method static where(string $string, Route|object|string|null $shortUrl)
 */
class Short extends Model
{
    protected $fillable = ['user_id', 'content', 'original_url', 'expiration_date', 'short_url', 'number_visits'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ips(): HasMany
    {
        return $this->hasMany(Ip::class, 'short_id');
    }
}
