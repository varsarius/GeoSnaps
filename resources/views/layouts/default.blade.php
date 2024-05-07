<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'GeoSnaps') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        document.getElementsByTagName('html')[0].setAttribute('data-bs-theme', localStorage.getItem("theme"));
    </script>
</head>
<body id="body">
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="{{route('main')}}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{asset('favicon.png')}}" width="128px" alt="to main">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('posts.index') }}" class="nav-link px-2 link-secondary">View posts</a></li>
            <li><a href="{{ route('posts.create') }}" class="nav-link px-2 link-secondary">Make a Post</a></li>
            <li><a href="{{ route('map') }}" class="nav-link px-2 link-secondary">Map</a></li>
        </ul>

        <div class="col-md-2 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>

        <div onclick="aSwitchMode()" class="col-md-1 form-check form-switch">
            <label onclick="aSwitchMode()" class="form-check-label" for="lightSwitch"> Dark Mode </label>
            <input class="form-check-input" type="checkbox" id="lightSwitch" />
        </div>
    </header>

    @yield('content')

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook"></i></svg></a></li>
            </ul>
        </footer>
    </div>
</div>
<script>


    function aSwitchMode() {
        if (document.getElementsByTagName('html')[0].getAttribute('data-bs-theme') === 'dark'){

            document.getElementsByTagName('html')[0].setAttribute('data-bs-theme', 'light');
            localStorage.setItem("theme", 'light');
        } else {
            document.getElementsByTagName('html')[0].setAttribute('data-bs-theme', 'dark');
            localStorage.setItem("theme", 'dark');
        }
    }

</script>
</body>
</html>
