<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeoLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'continent' => data_get($this->resource, 'data.continent.names.pt-BR'),
            'country' => data_get($this->resource, 'data.country.names.pt-BR'),
            'registered_country' => data_get($this->resource, 'data.registered_country.names.pt-BR'),
            'city_br' => data_get($this->resource, 'data.city.names.pt-BR'),
            'city_en' => data_get($this->resource, 'data.city.names.en'),
            'latitude' => data_get($this->resource, 'data.location.latitude'),
            'longitude' => data_get($this->resource, 'data.location.longitude'),
            'time_zone' => data_get($this->resource, 'data.location.time_zone'),
            'subdivisions' => data_get($this->resource, 'data.subdivisions.0.names.pt-BR'),
            'maps' => 'https://www.google.com/maps/place//@' . data_get($this->resource, 'data.location.latitude') . ',' . data_get($this->resource, 'data.location.longitude') . ',105m/data=!3m1!1e3!4m6!1m5!3m4!2zMTXCsDM2JzU2LjkiUyA0N8KwMzknMTAuMSJX!8m2!3d-15.6158!4d-47.6528?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D'
        ];
    }
}
