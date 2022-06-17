<!DOCTYPE html>
<html lang="en">
<div id="loading" style="background-image: url('{{ asset('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGlicmFyeXxlbnwwfHwwfHw%3D&w=1000&q=80')}}');">

<head>

</head>
<head>
    <title>Library project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-size: 200% ;font-family: monospace" href="{{ route('main') }}">MyLibrary</a>
            <img src="https://freepngimg.com/thumb/book/9-open-book-png-image.png" width="50" height="50">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    @if(Auth::check() && (!Auth::user()->is_librarian))
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left: 50px;padding-top: 25px;vertical-align: middle;"href="{{ route('borrows.index') }}">My rentals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-top: 25px;" href="{{ route('profile') }}">Profile</a>
                    </li>
                    @elseif(Auth::check() && (Auth::user()->is_librarian))
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left: 50px;padding-top: 25px" href="{{ route('books.create') }}">Add new book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-top: 25px" href="{{ route('genres.index') }}">Genre list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-top: 25px"href="{{ route('borrows.list') }}">Rental list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-top: 25px" href="{{ route('profile') }}">Profile</a>
                    </li>
                    @endif
                </ul>
                <form class="d-flex" action="{{ route('books.index') }}" method="GET" role="search" style="padding-top: 15px">
                    <input class="form-control me-2" name="term" id="term" type="text" placeholder="Search books">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <div class="col-sm-3 my-3">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" style="vertical-align: middle;padding-top: 15px;padding-left: 70px">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

</body>

</html>