<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_landing_blog extends Model
{
    protected $fillable = ['title', 't_tag_id', 'img_thumb', 'img_source', 'meta_title', 'meta_desc', 'post', 'creator', 'created_at', 'updated_at'];
}
