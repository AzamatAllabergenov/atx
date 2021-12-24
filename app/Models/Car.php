<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Car extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getNameAttribute()
    {
    	return $this->{'name_'.App::getLocale()};
    }

    public function getInteriorAttribute()
    {
    	return $this->{'interior_'.App::getLocale()};
    }

    public function getExteriorAttribute()
    {
    	return $this->{'exterior_'.App::getLocale()};
    }

    public function colors()
    {
        return $this->hasMany('App\Models\CarColor');
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Position');
    }

    public function options()
    {
        return $this->belongsToMany('App\Models\Option', 'option_car');
    }
}
