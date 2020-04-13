<div class="sidebar">
    @if( Auth::user()->role->name == 'admin' )
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
                    Admin Dashboard
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
                    <a data-toggle="collapse" href="#quizCollapse" aria-expanded="false" aria-controls="quizCollapse">
                        <i class="fas fa-tasks"></i>
                        <p>All Quizzes</p>
                    </a>
                    <div class="list-group" id="quizCollapse">
                        <a href="{{ route('quiz.index') }}" class="list-group-item list-group-item-action">
                            All Quizzes
                        </a>
                        <a href="" class="list-group-item list-group-item-action">
                            Add New Quiz
                        </a>
                    </div>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-users"></i>
                        <p>Manage Users</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
        </div>
    @else
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">
                    Student Dashboard
                </a>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >
                        <i class="fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endif
</div>
