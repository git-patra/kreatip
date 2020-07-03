<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_materi_blog extends Model
{
    public function materiCourse()
    {
        return $this->belongsTo('App\t_materi_course', 't_materi_course_id');
    }

    protected $fillable = ['t_materi_course_id', 'bab_mapel', 'blog_title', 'img_thumb', 'img_source', 'meta_title', 'meta_desc', 't_tag_id', 'blog_post', 'creator', 'created_at', 'updated_at'];
}
