<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class IpLocationResource
 */
class IpLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'country_name' => $this->country_name,
            'city_name' => $this->city_name
        ];
    }
}
