<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Album extends Model
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
}
