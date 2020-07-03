<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoBlog extends JsonResource
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
            'category' => $this->infoCategory->category_name,
            'subcategory' => $this->infoSubcategory->subcategory_name,
            'country' => ($this->t_info_country_id) ? $this->infoCountry->country_name : 'none',
            'pelajar' => ($this->t_info_pelajar_id) ? $this->infoPelajar->pelajar_name : 'none',
            'course' => ($this->t_info_course_id) ? $this->infoCourses->course_name : 'none',
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
