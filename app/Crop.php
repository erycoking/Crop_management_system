<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{


	protected $dates = ['harvesting_time'];

    public function disease()
    {
    	return $this->belongsToMany('App\Disease');
    }
}
