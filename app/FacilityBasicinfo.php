<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityBasicinfo extends Model
{
    //
    protected $table = 'facility_basicinfo';

    public function price()
    {
        return $this->hasMany('App\FacilityPrice', 'facility_id');
    }
}
