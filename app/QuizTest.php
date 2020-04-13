<?php

namespace App;

use App\User;
use App\Quiz;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class QuizTest extends Model
{
    protected $table = 'quizzes_test';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
