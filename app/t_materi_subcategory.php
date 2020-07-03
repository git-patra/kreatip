<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_materi_subcategory extends Model
{

    public function materiCategory()
    {
        return $this->belongsTo('App\t_materi_category', 't_materi_category_id');
    }

    public function materiCourses()
    {
        return $this->hasMany('App\t_materi_course');
    }

    protected $fillable = ['t_materi_category_id', 'subcategory_name', 'icon', 'status', 'creator', 'created_at', 'updated_at'];
}
