<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MateriBlog extends JsonResource
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
            'course' => $this->materiCourse->course_name_alias,
            'mapel' => $this->bab_mapel,
            'title' => $this->blog_title,
            'thumbnail_path' => $this->img_thumb,
            'source_image' => $this->img_source,
            'tag' => $this->t_tag_id,
            'artikel' => $this->blog_post,
            'meta_title' => $this->meta_title,
            'meta_desc' => $this->meta_desc,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
