<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Slider extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getUrlAttribute()
    {
    	return $this->{'url_'.App::getLocale()};
    }
}
