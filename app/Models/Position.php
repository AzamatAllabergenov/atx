<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Position extends Model
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

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature')->withPivot(['value_uz', 'value_ru']);
    }

    public function options()
    {
        return $this->belongsToMany('App\Models\Option');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}
