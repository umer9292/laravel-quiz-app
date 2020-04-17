@extends('layouts.app')
@section('content')
    <div class="py-5 frontend-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                @if($quizzes->count() > 0)
                    @foreach($quizzes as $quiz)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm quiz-card">
                        <div class="card-header">
                            <h3>{{strtoupper($quiz->title)}}</h3>
                        </div>
                        <div class="card-body mt-3 mb-5">
                            <p style="font-size: 18px !important; font-weight: bold !important;">
                                Total Question: <b class="text-primary">{{$quiz->number_of_question}}</b><br>
                                Passing Marks: <b class="text-primary">{{$quiz->passing_marks}}</b><br>
                                Description: <strong class="text-primary">{{substr($quiz->description, 0, 10)}}</strong>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('take.quiz', $quiz->id) }}" class="btn btn-primary btn-block">Take Quiz</a>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
