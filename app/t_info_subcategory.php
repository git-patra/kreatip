<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_subcategory extends Model
{
    public function infoCategory()
    {
        return $this->belongsTo('App\t_info_category', 't_info_category_id');
    }

    public function infoPelajars()
    {
        return $this->hasMany('App\t_info_pelajar');
    }

    public function infoContinents()
    {
        return $this->hasMany('App\t_info_continent');
    }

    public function infoCourses()
    {
        return $this->hasMany('App\t_info_course');
    }

    public function infoBlogs()
    {
        return $this->hasMany('App\t_info_blog');
    }

    protected $fillable = ['t_info_category_id', 'subcategory_name', 'status', 'creator', 'created_at', 'updated_at'];
}
