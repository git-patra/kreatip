<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_blog extends Model
{
    public function infoCategory()
    {
        return $this->belongsTo('App\t_info_category', 't_info_category_id');
    }

    public function infoSubcategory()
    {
        return $this->belongsTo('App\t_info_subcategory', 't_info_subcategory_id');
    }

    public function infoCourses()
    {
        return $this->belongsTo('App\t_info_course', 't_info_course_id');
    }

    public function infoCountry()
    {
        return $this->belongsTo('App\t_info_country', 't_info_country_id');
    }

    public function infoPelajar()
    {
        return $this->belongsTo('App\t_info_pelajar', 't_info_pelajar_id');
    }

    protected $fillable = ['t_info_category_id', 't_info_subcategory_id', 't_info_pelajar_id', 't_info_country_id', 't_info_course_id', 't_tag_id', 'meta_title', 'meta_desc', 'img_thumb', 'img_source',  'blog_title',  'blog_post', 'creator', 'created_at', 'updated_at'];
}
