<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeolocationData extends Model
{
    use HasFactory;

    // Definindo um nome de tabela personalizado
    protected $table = 'geolocation_data';  // Altere conforme necessário

    protected $fillable = ['data'];  // Campos que podem ser preenchidos
    protected $casts = [
        'data' => 'array',  // Cast automático para array
    ];
}
