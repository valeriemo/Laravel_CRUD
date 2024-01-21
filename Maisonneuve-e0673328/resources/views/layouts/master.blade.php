@php $locale = session()->get('locale'); @endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
        <div class="collapse navbar-collapse">
            <a href="{{ Auth::user() ? route('blog.index') : route('login') }}"><img class="logo" src="{{asset('img/reseaulogo.svg')}}" alt="logo">
            </a>
            <p>@lang('lang.welcome') {{Auth::user() ? Auth::user()->username : "Guest"}}</p>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">@lang('lang.login')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">@lang('lang.register')</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">@lang('lang.blog-all')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.create') }}">@lang('lang.write')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('file.index') }}">@lang('lang.files')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">@lang('lang.logout')</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link icon-lang" href="{{ route('lang', 'en') }}"><img src="{{ asset('img/english.svg') }}" alt="English"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link icon-lang" href="{{ route('lang', 'fr') }}"><img src="{{ asset('img/french.svg') }}" alt="Francais"></a>
                </li>
            </ul>
        </div>
    </nav>
    <main>

        <div class="container mt-5">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('content')
        </div>

    </main>

    <footer>
        <p>&copy; 2023 Valérie Moreau. TP 2 | Laravel CRUD.</p>
    </footer>

</body>

</html>