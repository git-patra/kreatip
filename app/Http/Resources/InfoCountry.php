<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoCountry extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'benua' => $this->infoContinent->continent_name,
            'benua_id' => $this->t_info_continent_id,
            'name' => $this->country_name,
            'status' => $this->status,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
