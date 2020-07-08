<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu_child extends Model
{
    public function submenu()
    {
        return $this->belongsTo('App\Submenu');
    }

    public function infoCategory()
    {
        return $this->belongsTo('App\t_info_category');
    }
}
