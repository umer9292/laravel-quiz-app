@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('quiz.index') }}">Quiz List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Quiz</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('quiz.update', $quiz->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="" value="{{ @$quiz->title }}">
                </div>
                <div class="form-group row">
                    <div class="col-md-4 col-sm-12">
                        <label for="number">Number of Questions</label>
                        <input type="number" id="number" class="form-control" name="number_of_question" value="{{ @$quiz->number_of_question }}">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marksPerQuestion">Marks Per Questions</label>
                        <input type="number" id="marksPerQuestion" class="form-control" name="marks_per_question" value="{{ @$quiz->marks_per_question }}">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="marks">Passing Marks</label>
                        <input type="number" id="marks" class="form-control" name="passing_marks" value="{{ @$quiz->passing_marks }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description"> {{ @$quiz->description }} </textarea>
                </div>
                <div class="form-group">
                    <label for="public">Publish Quiz</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publish" id="publish-yes" value="1"
                        @if($quiz->publish == 1) {{'checked'}} @endif >
                        <label class="form-check-label" for="publish-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publish" id="publish-no" value="0"
                        @if($quiz->publish == 0) {{'checked'}} @endif>
                        <label class="form-check-label" for="publish-no">No</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
