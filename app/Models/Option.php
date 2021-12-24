<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Option extends Model
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

    protected static function boot()
    {
        parent::boot();

        // before delete() method call this
        static::deleting(function($item) {
            \DB::table('option_position')->where('option_id', $item->id)->delete();
        });
    }
}
