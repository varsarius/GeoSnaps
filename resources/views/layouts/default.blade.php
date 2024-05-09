<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
            <li><a href="{{ route('posts.index') }}" class="nav-link px-2 link-secondary">{{ __('messages.w') }}</a></li>
            @if (auth()->check())
                <li><a href="{{ route('posts.create') }}" class="nav-link px-2 link-secondary">Опубликовать</a></li>
            @endif
            <li><a href="{{ route('map') }}" class="nav-link px-2 link-secondary">Карта</a></li>
            @if (auth()->check())
                <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary">Личный кабинет</a></li>
            @endif
        </ul>

        <!-- Right Side Of Navbar -->
        <div class="col-md-2 text-end">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item col-md-6" style="margin-bottom: 1em">
                            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item col-md-6">
                            <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
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

        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-3d7942f" data-id="3d7942f" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-e298f63 cpel-switcher--align-center cpel-switcher--layout-horizontal cpel-switcher--aspect-ratio-43 elementor-widget elementor-widget-polylang-language-switcher" data-id="e298f63" data-element_type="widget" data-widget_type="polylang-language-switcher.default">
                    <div class="elementor-widget-container">
                        <nav class="cpel-switcher__nav">
                            <ul class="cpel-switcher__list">
                                <li class="cpel-switcher__lang cpel-switcher__lang--active">
                                    <a lang="ro-RO" hreflang="ro-RO" href="{{ route('locale', 'md') }}">
                                        <span class="cpel-switcher__flag cpel-switcher__flag--md">
                                            <img src="data:image/svg+xml;utf8,%3Csvg width='21' height='15' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='a'%3E%3Cstop stop-color='%23FFF' offset='0%'/%3E%3Cstop stop-color='%23F0F0F0' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='b'%3E%3Cstop stop-color='%23EB1C43' offset='0%'/%3E%3Cstop stop-color='%23CA1134' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='c'%3E%3Cstop stop-color='%23115BCB' offset='0%'/%3E%3Cstop stop-color='%23094AAC' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='f'%3E%3Cstop stop-color='%23FFD953' offset='0%'/%3E%3Cstop stop-color='%23FFD130' offset='100%'/%3E%3C/linearGradient%3E%3Cfilter x='-10.7%' y='-5%' width='121.4%' height='110%' filterUnits='objectBoundingBox' id='d'%3E%3CfeMorphology radius='.25' operator='dilate' in='SourceAlpha' result='shadowSpreadOuter1'/%3E%3CfeOffset in='shadowSpreadOuter1' result='shadowOffsetOuter1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0' in='shadowOffsetOuter1'/%3E%3C/filter%3E%3Cpath id='e' d='M7 0h7v15H7z'/%3E%3C/defs%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cpath fill='url(%23a)' d='M0 0h21v15H0z'/%3E%3Cpath fill='url(%23b)' d='M10 0h11v15H10z'/%3E%3Cpath fill='url(%23c)' d='M0 0h7v15H0z'/%3E%3Cuse fill='%23000' filter='url(%23d)' xlink:href='%23e'/%3E%3Cuse fill='url(%23f)' xlink:href='%23e'/%3E%3Cpath d='M9 6h1l.5-1.5L11 6h1v3l-1.5 1L9 9V6zm1 1v1.5h1V7h-1z' fill='%23AF7F59'/%3E%3C/g%3E%3C/svg%3E" alt="ROMÂNĂ">
                                        </span>
                                    </a>
                                </li>
                                <li class="cpel-switcher__lang">
                                    <a lang="en-GB" hreflang="en-GB" href="{{ route('locale', 'en') }}">
                                        <span class="cpel-switcher__flag cpel-switcher__flag--gb">
                                            <img src="data:image/svg+xml;utf8,%3Csvg width='21' height='15' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='a'%3E%3Cstop stop-color='%23FFF' offset='0%'/%3E%3Cstop stop-color='%23F0F0F0' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='b'%3E%3Cstop stop-color='%230A17A7' offset='0%'/%3E%3Cstop stop-color='%23030E88' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='c'%3E%3Cstop stop-color='%23E6273E' offset='0%'/%3E%3Cstop stop-color='%23CF152B' offset='100%'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cpath fill='url(%23a)' d='M0 0h21v15H0z'/%3E%3Cpath fill='url(%23b)' d='M-.002 0h21v15h-21z'/%3E%3Cpath d='M5.003 10H-.002V5h5.005L-2.082.22l1.118-1.657 8.962 6.045V-1h5v5.608l8.962-6.045L23.078.22 15.993 5h5.005v5h-5.005l7.085 4.78-1.118 1.657-8.962-6.045V16h-5v-5.608l-8.962 6.045-1.118-1.658L5.003 10z' fill='url(%23a)'/%3E%3Cpath d='M14.136 4.958l9.5-6.25a.25.25 0 00-.275-.417l-9.5 6.25a.25.25 0 10.275.417zm.732 5.522l8.515 5.74a.25.25 0 10.28-.415l-8.516-5.74a.25.25 0 00-.279.415zM6.142 4.526L-2.74-1.461a.25.25 0 00-.28.415L5.863 4.94a.25.25 0 00.279-.414zm.685 5.469l-9.845 6.53a.25.25 0 10.276.416l9.846-6.529a.25.25 0 00-.277-.417z' fill='%23DB1F35' fill-rule='nonzero'/%3E%3Cpath fill='url(%23c)' d='M-.002 9h9v6h3V9h9V6h-9V0h-3v6h-9z'/%3E%3C/g%3E%3C/svg%3E" alt="ENGLISH">
                                        </span>
                                    </a>
                                </li>
                                <li class="cpel-switcher__lang">
                                    <a lang="ru-RU" hreflang="ru-RU" href="{{ route('locale', 'ru') }}">
                                        <span class="cpel-switcher__flag cpel-switcher__flag--ru">
                                            <img src="data:image/svg+xml;utf8,%3Csvg width='21' height='15' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='a'%3E%3Cstop stop-color='%23FFF' offset='0%'/%3E%3Cstop stop-color='%23F0F0F0' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='b'%3E%3Cstop stop-color='%230C47B7' offset='0%'/%3E%3Cstop stop-color='%23073DA4' offset='100%'/%3E%3C/linearGradient%3E%3ClinearGradient x1='50%' y1='0%' x2='50%' y2='100%' id='c'%3E%3Cstop stop-color='%23E53B35' offset='0%'/%3E%3Cstop stop-color='%23D32E28' offset='100%'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cpath fill='url(%23a)' d='M0 0h21v15H0z'/%3E%3Cpath fill='url(%23b)' d='M0 5h21v5H0z'/%3E%3Cpath fill='url(%23c)' d='M0 10h21v5H0z'/%3E%3Cpath fill='url(%23a)' d='M0 0h21v5H0z'/%3E%3C/g%3E%3C/svg%3E" alt="РУССКИЙ">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <label class="form-check-label" for="lightSwitch"> Dark Mode
            <div class="col-md-1 form-check form-switch">
                <input onchange="aSwitchMode()" class="form-check-input" type="checkbox" id="lightSwitch" />
            </div>
        </label>
    </header>

    @yield('content')

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">© {{date("Y")}} Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/@UtmMd1"><i class="bi bi-youtube"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/utmoldova/"><i class="bi bi-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://t.me/admitereaUTM2024"><i class="bi bi-telegram"></i></svg></a></li>
            </ul>
        </footer>
    </div>
</div>
<script>



    document.getElementById('lightSwitch').checked = (localStorage.getItem("theme") === 'dark');

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
