<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Feature extends Model
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

    public function group()
    {
        return $this->hasOne('App\Models\FeatureGroup', 'id', 'feature_group_id');
    }

    protected static function boot()
    {
        parent::boot();

        // before delete() method call this
        static::deleting(function($item) {
            \DB::table('feature_position')->where('feature_id', $item->id)->delete();
        });
    }
}
