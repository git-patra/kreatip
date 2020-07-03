<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_info_country extends Model
{
    public function infoContinent()
    {
        return $this->belongsTo('App\t_info_continent', 't_info_continent_id');
    }

    protected $fillable = ['t_info_continent_id', 'country_name', 'status', 'creator', 'created_at', 'updated_at'];
}
