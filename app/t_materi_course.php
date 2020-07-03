<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_materi_course extends Model
{
    public function subCategory()
    {
        return $this->belongsTo('App\t_materi_subcategory', 't_materi_subcategory_id');
    }

    public function materiBlogs()
    {
        return $this->hasMany('App\t_materi_blog');
    }

    protected $fillable = ['t_materi_subcategory_id', 'course_name', 'course_name_alias', 'status', 'creator', 'created_at', 'updated_at'];
}
