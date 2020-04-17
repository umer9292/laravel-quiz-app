@extends('layouts.protected')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Quizzes</li>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">
                            <i class="tim-icons icon-bell-55 text-primary"></i>
                            Quiz List
                        </h3>
                        <a href="{{ route('quiz.create') }}" class="btn btn-sm btn-primary btn-simple">
                            <i class="fas fa-plus"></i>
                            Add Quiz
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-dark">
                            <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Number of Question</th>
                                <th scope="col">Passing Marks</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($quizzes->count() > 0)
                                    @foreach($quizzes as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $quiz->title }}</td>
                                            <td>{{ $quiz->number_of_question }}</td>
                                            <td>{{ $quiz->passing_marks }}</td>
                                            <td>{{ $quiz->description }}</td>
                                            <td>
                                                @if($quiz->publish)
                                                    <span class="badge badge-success">Published</span>
                                                    @else
                                                    <span class="badge badge-info">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ diff4Human($quiz->created_at) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-sm btn-primary btn-simple active">
                                                        Edit
                                                    </a>

                                                    <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-sm btn-primary btn-simple">
                                                        Browse
                                                    </a>
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
    </div>
@endsection
@section('extra_js')
@endsection
