@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title text-primary">
                        <i class="fas fa-list-alt"></i>
                        Quizzes
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-dark">
                        <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">Number of Question</th>
                            <th scope="col">Passing Marks</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($quizzes->count() > 0)
                            @foreach($quizzes as $quiz)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $quiz->title }}</td>
                                    <td>
                                        <span class="badge badge-success badge-pill text-dark">{{ $quiz->number_of_question }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light badge-pill text-dark">{{ $quiz->passing_marks }}</span>
                                    </td>
                                    <td>{{ $quiz->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($quiz->quiztaken)
                                                <a href="{{ route('quiz.result', $quiz->id) }}" class="element" data-toggle="tooltip" data-placement="top" title="View Result">
                                                    <span class="fas fa-eye text-primary"></span>
                                                </a> &nbsp;&nbsp;
                                                <a href="{{ route('quiz.export.pdf', $quiz->id) }}" class="element" data-toggle="tooltip" data-placement="top" title="Export Pdf">
                                                    <span class="fas fa-file-pdf text-danger"></span>
                                                </a> &nbsp;&nbsp;
                                                <a href="{{ route('quiz.export.excel', $quiz->id) }}" class="element"  data-toggle="tooltip" data-placement="top" title="Export Excel">
                                                    <span class="fas fa-file-excel text-success"></span>
                                                </a>
                                            @else
                                                <a href="{{ route('take.quiz', $quiz->id) }}" class="element"  data-toggle="tooltip" data-placement="top" title="Take Quiz">
                                                    <span class="fas fa-edit"></span>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-info">
                                        Quizzes Not Found
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $quizzes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
