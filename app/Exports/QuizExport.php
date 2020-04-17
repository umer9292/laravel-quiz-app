<?php

namespace App\Exports;

use App\Quiz;
use App\QuizTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class QuizExport implements FromView, ShouldAutoSize
{

    public  $quizId;
    public function __construct($quizId)
    {
        $this->quizId = $quizId;
    }

    public function view(): View
    {
        $quiz = Quiz::find($this->quizId);
        $questions = QuizTest::with('question')
            ->where([
                ['user_id', '=', Auth::user()->id],
                ['quiz_id', '=', $this->quizId],
            ])
            ->get();

        $correctAnswers = $questions->filter(function ($value) {
            return $value->answer_status == 1;
        });

        $totalMarks = $quiz->marks_per_question * $quiz->number_of_question;
        $obtainMarks = $quiz->marks_per_question * count($correctAnswers);
        $findPercentage = $obtainMarks / $totalMarks * 100;
        $result = $findPercentage > $quiz->passing_marks ? 'Pass' : 'Fail';
        return view('excel.quiz-result', compact(    'questions', 'quiz',
            'correctAnswers',
            'findPercentage',
            'result',
            'totalMarks',
            'obtainMarks'));
    }

}
