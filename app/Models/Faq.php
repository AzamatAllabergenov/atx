<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Faq extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getQuestionAttribute()
    {
    	return $this->{'question_'.App::getLocale()};
    }

    public function getAnswerAttribute()
    {
    	return $this->{'answer_'.App::getLocale()};
    }
}
