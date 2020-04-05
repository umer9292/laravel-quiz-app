<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
                Dashboard
            </a>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-tasks"></i>
                    <p>Manage Quiz</p>
                </a>
                <div class="list-group" id="collapseExample">
                    <a href="{{ route('quiz.index') }}" class="list-group-item list-group-item-action">
                        All Quizzes
                    </a>
                    <a href="{{ route('quiz.create') }}" class="list-group-item list-group-item-action">
                        Add New Quiz
                    </a>
                </div>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-user-circle"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-table"></i>
                    <p>Table List</p>
                </a>
            </li>
        </ul>
    </div>
</div>
