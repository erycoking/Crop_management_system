<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{


	protected $dates = ['harvesting_time'];
	
    public function crop()
    {
    	return $this->belongsToMany('App\Crop', 'crop_disease', 'crop_id', 'disease_id');
    }
}
