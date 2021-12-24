<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Autoservice extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getTitleAttribute()
    {
    	return $this->{'title_'.App::getLocale()};
    }

    public function getTextAttribute()
    {
    	return $this->{'text_'.App::getLocale()};
    }
}
