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

    <style>
        #aaa {
            background-image: url('images/2019-03-16 1.10.28.jpg');
            position: relative;
            z-index: 0;
            margin-right: auto;
            margin-left: auto;
            background-size: contain;
        }

        #aaa::before {
            content: '';
            position: absolute;
            top: -3px;
            bottom: -3px;
            left: -3px;
            right: -3px;
            background: inherit;
            filter: blur(3px);
            z-index: -1;
        }

        .title {
            font-size: 85px;
            color: #e9ecef;
            text-shadow: 4px 4px 5px #808080;
        }

        .subtitle {
            font-size: 20px;
            color: #e9ecef;
            text-shadow: 3px 3px 5px #808080;
        }

        .btn-flat-border {
          border-radius: 0;
          width: 310px;
          height: 50px;
          font-size: 0.9rem
          display: inline-block;
          padding: 0.3em 1em;
          text-decoration: none;
          border-radius: 3px;
          transition: .4s;
          margin: 20px 10px 10px 10px;
        }
        .test {
          color: #FFA000;
          border: solid 2px #FFA000;
          background-color: #f8fafc8a;
        }
        .test:hover {
          background: #FFA000;
          color: white;
        }
        .login {
          color: green;
          border: solid 2px green;
          background-color: #f8fafc8a;
        }
        .login:hover {
          background: green;
          color: white;
        }
        .register {
          color: blue;
          border: solid 2px blue;
          background-color: #f8fafc8a;
        }
        .register:hover {
          background: blue;
          color: white;
        }
        .padding-original {
          padding: 150px 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
    </style>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i>ホーム</a>
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
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-key"></i>ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i>新規ユーザー登録</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        <div align="center">
            <hr>
            <p class="copyright">(C) 2019 self management / created by T.Y.</p>
        </div>
    </footer>
</body>
</html>
