<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Manager</title>
    {{-- <link rel="stylesheet" href="{{ asset('font/Jetbrains Mono/jetbrains_mono.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('font/Rubik/rubik.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('font/Roboto/roboto.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('font/RemixIcon_v4.2.0/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
</head>
<body>
    <div class="wrapper">
        <section class="sidebar">
            <a href="/" class="logo">
                <img src="{{ asset('img/laravel-2.svg') }}" alt="laravel logo">
            </a>
            <nav class="menu">
                <ul>
                    <li>
                        <a href="" class="actived">
                            <i class="ri-home-2-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ri-user-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ri-hashtag"></i>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ri-settings-3-line"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <main class="main">
            <h3 class="main-title">
                Cuentas de Usuario 
                {{ !empty($page_title) ? ' - '.$page_title : '' }}
            </h3>
            <div class="">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>