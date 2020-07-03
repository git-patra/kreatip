<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_continent extends Model
{
    public function infoCountries()
    {
        return $this->hasMany('App\t_info_country');
    }

    public function infoSubCategory()
    {
        return $this->belongsTo('App\t_info_subcategory', 't_info_subcategory_id');
    }

    protected $fillable = ['t_info_subcategory_id', 'continent_name', 'status', 'creator', 'created_at', 'updated_at'];
}
