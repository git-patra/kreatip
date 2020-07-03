<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_tips_blog extends Model
{
    public function tipsCategory()
    {
        return $this->belongsTo('App\t_tips_category', 't_tips_category_id');
    }

    protected $fillable = ['t_tips_category_id', 'blog_title', 'img_thumb', 'meta_title', 'meta_desc', 'img_source', 't_tag_id', 'blog_post', 'creator', 'created_at', 'updated_at'];
}
