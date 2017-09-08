<header>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                    Jobs
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (Sentinel::check())

                        @if (Sentinel::inRole('client'))

                            <li class="nav-item">
                                <a href="/vacancies" class="nav-link">Browse vacancies</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myResumes') }}" class="nav-link">My resumes</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('favoriteVacancies') }}" class="nav-link">Favorites</a>
                            </li>

                        @elseif(Sentinel::inRole('employer'))

                            <li class="nav-item">
                                <a href="/resumes" class="nav-link">Browse resumes</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myVacancies') }}" class="nav-link">My vacancies</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('favoriteResumes') }}" class="nav-link">Favorites</a>
                            </li>

                        @endif



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Sentinel::getUser()->getUserLogin() }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                    {{ csrf_field() }}
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                                </form>
                            </div>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="/vacancies">Browse vacancies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/employer">For employer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>