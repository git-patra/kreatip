<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoPelajar extends JsonResource
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
            'subcategory' => $this->t_info_subcategory_id,
            'name' => $this->pelajar_name,
            'status' => $this->status,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
