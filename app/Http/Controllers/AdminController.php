<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizTaken;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalQuizzes = Quiz::count();
        $totalStudents = User::where('role_id', '=' ,2)->count();
        $quizzesTaken = QuizTaken::count();
        return view('admin.dashboard',
            compact('totalQuizzes', 'totalStudents', 'quizzesTaken')
        );
    }
}
