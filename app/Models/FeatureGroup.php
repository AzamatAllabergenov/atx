<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class FeatureGroup extends Model
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
        return $this->hasMany('App\Models\Feature', 'feature_group_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // before delete() method call this
        static::deleting(function($item) {
            $item->features()->delete();
        });
    }
}
