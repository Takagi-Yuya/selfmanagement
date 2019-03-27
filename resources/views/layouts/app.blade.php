<!DOCTYPE html>
<html lang="en" dir="ltr">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'セルマネ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet" type="text/css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--とりあえずここに書いてるだけ-->
    <style>
    img {
      width: 600px;
      height: 600px;
      object-fit: cover;
      border-radius: 50%;
    }
    .navbar {
      background-color: #0099CC;
    }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" >
                    {{ config('app.name', 'セルマネ') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-key"></i>ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>新規ユーザー登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/home') }}">
                                        <i class="fas fa-home"></i>ホーム
                                    </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ action('Admin\AnalysisController@list') }}">
                                        <i class="fas fa-id-card"></i>自己分析一覧
                                    </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ action('Admin\OtherQuestionController@list') }}">
                                        <i class="far fa-id-card"></i>他己分析一覧
                                    </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ action('Admin\OtherQuestionController@index') }}">
                                        <i class="fas fa-sort-amount-up"></i>他己分析タイムライン
                                    </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ action('Admin\DiaryController@list') }}">
                                        <i class="fas fa-pencil-alt"></i>日記一覧
                                    </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('Admin\PortfolioController@list') }}">
                                    <i class="fas fa-chart-pie"></i>ポートフォリオ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('Admin\ProfileController@list') }}">
                                    <i class="fas fa-user"></i>プロフィール
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}">
                                    <i class="fas fa-coffee"></i>about
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-door-open"></i>ログアウト
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        <div align="center">
            <hr>
            <p class="copyright">(C) 2019 self management   by T.Y.</p>
        </div>
    </footer>
</body>
</html>
