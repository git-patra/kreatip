<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_category extends Model
{
    public function infoSubcategories()
    {
        return $this->hasMany('App\t_info_subcategory');
    }

    public function submenuChildren()
    {
        return $this->hasMany('App\Submenu_child');
    }

    public function infoBlogs()
    {
        return $this->hasMany('App\t_info_blog');
    }

    protected $fillable = ['category_name', 'status', 'creator', 'created_at', 'updated_at'];
}
