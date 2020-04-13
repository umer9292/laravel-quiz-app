<?php

namespace App;

use App\User;
use App\Question;
use App\QuizTaken;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    protected $guarded = [];

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function quizTaken()
    {
        return $this->hasOne('App\QuizTaken')
            ->where('user_id', Auth::user()->id);
    }
}
