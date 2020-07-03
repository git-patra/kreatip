<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_pelajar extends Model
{
    public function infoSubcategory()
    {
        return $this->belongsTo('App\t_info_subcategory', 't_info_subcategory_id');
    }

    protected $fillable = ['t_info_subcategory_id', 'pelajar_name', 'status', 'creator', 'created_at', 'updated_at'];
}
