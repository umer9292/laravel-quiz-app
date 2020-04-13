@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Results</li>
    <li class="breadcrumb-item active" aria-current="page">{{$quiz->title}}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="total pull-right">
                Total correct: {{count($correctAnswers)}} / {{count($questions)}}
            </div>
            <table class="table result-table">
                <thead class="table-head">
                    <tr style="background: #34a714 !important;text-align: center !important;">
                        <th scope="col">Question No.</th>
                        <th scope="col">Your Answers</th>
                        <th scope="col">Correct Answers</th>
                        <th scope="col">Result</th>
                    </tr>
                </thead>
                <tbody>
                @if($questions->count() > 0)
                    @foreach($questions as $question)
                    <tr>
                        <td>{{$question->question_id}}</td>
                        <td>{{$question->selected_answer}}</td>
                        <td>{{$question->question->correct_answer}}</td>
                        <td>
                            {{ $question->question->correct_answer === $question->selected_answer
                            ? 'Correct'
                            : 'Incorrect' }}
                        </td>
                    </tr>
                    @endforeach
                @endif
                <tr>
                    <td colspan="4">
                        <h4 class="result-text">
                            You are {{$result}} in this quiz with <strong>{{$findPercentage}} %</strong> Marks.
                        </h4>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
