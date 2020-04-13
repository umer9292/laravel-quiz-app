<?php

namespace App;

use App\Answer;
use App\Quiz;
use App\QuizTest;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function answer() {
        return $this->belongsTo('App\Answer');
    }

    public function quiz() {
        return $this->hasMany('App\Quiz');
    }

    public function quizTest() {
        return $this->hasMany('App\QuizTest');
    }
}
