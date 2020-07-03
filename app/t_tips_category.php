<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_tips_category extends Model
{
    public function tipsBlogs()
    {
        return $this->hasMany('App\t_tips_blog');
    }

    protected $fillable = ['category_name', 'status', 'creator', 'created_at', 'updated_at'];
}
