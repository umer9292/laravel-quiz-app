<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminQuestionStore;
use App\Question;
use App\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $quizId = $request->quiz_id;
            $numberOfQuestion = Quiz::where('id', $quizId)
                ->select('number_of_question')
                ->first();
            $totalQuestions = Question::where('quiz_id', $quizId)->count()+1;

            $newQuestion = [
                "quiz_id" => $quizId,
                "question" => $request->question,
                "correct_answer" => $request->correct_answer,
                "option_1" => $request->option_1,
                "option_2" => $request->option_2,
                "option_3" => $request->option_3,
                "option_4" => $request->option_4,
            ];

            $question = Question::create($newQuestion);
            if ($question) {
                if($totalQuestions == $numberOfQuestion->number_of_question) {
                    Quiz::where('id', $quizId)->update(['publish' => 1]);
                }
                return back()->with('success', 'Question Successfully Created');
            }
            else
                return back()->with('error', 'Question Creating Error!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(AdminQuestionStore $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
