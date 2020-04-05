<?php

namespace App;

use App\Question;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
