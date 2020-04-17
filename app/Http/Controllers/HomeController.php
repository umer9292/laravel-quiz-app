<?php

namespace App\Http\Controllers;

use App\Exports\QuizExport;
use App\Question;
use Maatwebsite\Excel\Excel;
use PDF;
use App\Quiz;
use App\QuizTaken;
use App\QuizTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $quizzes = Quiz::with('quizTaken')
                ->paginate(5);
        return view('home.index', compact('quizzes'));
    }

    public function takeQuiz(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $quizExist =  QuizTaken::where([
            ['user_id', '=' , $userId],
            ['quiz_id', '=' , $quizId],
        ])->count();

        if (!$quizExist) {
            QuizTaken::create([
                'user_id' => $userId,
                'quiz_id' => $quizId,
            ]);
            return redirect()->route('show.questions', [$quiz, 0]);
        }
         else
            return redirect()->route('quiz.result', $quiz->id);

    }

    public function showQuestions(Quiz $quiz, $currentQuestion = 0)
    {
        $quizId = $quiz->id;
        $questionId = Question::where('quiz_id', $quizId)
            ->pluck('id')
            ->toArray();

        if ($currentQuestion < count($questionId)) {
            $question = Question::find($questionId[$currentQuestion]);
            $nextQuestion = $currentQuestion+1;
            return view('home.questions', compact('quiz', 'question', 'nextQuestion'));
        }else {
            return back()->with('error', 'Questions not found!!');
        }
    }

    public function storeAnswer(Request $request)
    {
        try {
            $userId = Auth::user()->id;
            $quizId = $request->quiz_id;
            $getCorrectAns = Question::where('id', $request->question_id)
                ->select('correct_answer')->first();

            $newQuizTest = [
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'question_id' => $request->question_id,
                'selected_answer' => $request->selected_answer,
                'answer_status' => ($getCorrectAns->correct_answer == $request->selected_answer) ? 1 : 0 ,
            ];


            if(QuizTest::create($newQuizTest))
            {
                if  ($request->next_question != 0) {
                    return redirect()->route('show.questions', [$quizId, $request->next_question]);
                }

                $numberOfQuestion = Quiz::where('id', $quizId)
                    ->select('number_of_question')
                    ->first();
                $totalQuestion = $numberOfQuestion->number_of_question;

                $getAnswerStatus = QuizTest::where([
                    ['user_id', '=', $userId],
                    ['quiz_id', '=', $quizId],
                    ['answer_status', '=', 1],
                ])
                ->count();

                QuizTaken::where([
                    ['user_id', '=', $userId],
                    ['quiz_id', '=', $quizId],
                ])
                ->update(['marks' => $getAnswerStatus*5]);
                return redirect()->route('quiz.result', $quizId);
            }
            else
                return back()->with('error', 'Error in Inserting!');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function quizResult(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $questions = QuizTest::with('question')
            ->where([
                ['user_id', '=', $userId],
                ['quiz_id', '=', $quizId],
            ])
            ->get();

        $correctAnswers = $questions->filter(function ($value) {
            return $value->answer_status == 1;
        });

        $totalMarks = $quiz->marks_per_question * $quiz->number_of_question;
        $obtainMarks = $quiz->marks_per_question * count($correctAnswers);
        $findPercentage = $obtainMarks / $totalMarks * 100;
        $result = $findPercentage > $quiz->passing_marks ? 'Pass' : 'Fail';

        return view('home.result', compact( 'questions',
            'quiz',
            'correctAnswers',
            'findPercentage',
            'result'));
    }

    public function createPdf(Quiz $quiz)
    {
        $userId = Auth::user()->id;
        $quizId = $quiz->id;

        $questions = QuizTest::with('question')
            ->where([
                ['user_id', '=', $userId],
                ['quiz_id', '=', $quizId],
            ])
            ->get();

        $correctAnswers = $questions->filter(function ($value) {
            return $value->answer_status == 1;
        });

        $totalMarks = $quiz->marks_per_question * $quiz->number_of_question;
        $obtainMarks = $quiz->marks_per_question * count($correctAnswers);
        $findPercentage = $obtainMarks / $totalMarks * 100;
        $result = $findPercentage > $quiz->passing_marks ? 'Pass' : 'Fail';

        $fileName = 'quiz-result'.now()->toDateTimeString().'.pdf';
        $pdf = PDF::loadView('pdf.quiz-result', compact('quiz',
            'questions',
            'correctAnswers',
            'findPercentage',
            'result',
            'totalMarks',
            'obtainMarks'));
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(public_path().DIRECTORY_SEPARATOR.'quiz-result.pdf');
        // Finally, you can download the file using download function
        return $pdf->download($fileName);
    }

    public function export(Quiz $quiz)
    {
        $quizId = $quiz->id;
        return \Maatwebsite\Excel\Facades\Excel::download(new QuizExport($quizId), 'quiz.xlsx');
    }
}
