<?php

namespace App;

use App\User;
use App\Quiz;
use Illuminate\Database\Eloquent\Model;

class QuizTaken extends Model
{
    protected $table = 'quizzes_taken';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }
}
