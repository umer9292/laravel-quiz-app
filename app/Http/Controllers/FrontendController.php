<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::orderByDesc('id')->get();
        return view('welcome', compact('quizzes'));
    }
}
