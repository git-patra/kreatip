<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_materi_category extends Model
{
    public function materiSubcategories()
    {
        return $this->hasMany('App\t_materi_subcategory');
    }

    protected $fillable = ['category_name', 'status', 'creator', 'created_at', 'updated_at'];
}
