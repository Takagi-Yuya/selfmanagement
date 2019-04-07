<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>セルマネ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: white;
                color: white;
                text-shadow: 5px 5px 10px #333333;
                font-family: 'Noto Sans JP', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .container {
                background-image: url('images/2019-03-16 1.10.28.jpg');
                position: relative;
                z-index: 0;
            }

            .container::before {
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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 120px;
            }

            .subtitle {
                font-size: 30px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            button {
              border-radius: 0;
              width: 400px;
              height: 50px;
              font-size: 0.9rem
            }
            .btn-flat-border {
              display: inline-block;
              padding: 0.3em 1em;
              text-decoration: none;
              color: #FFA000;
              border: solid 2px #FFA000;
              border-radius: 3px;
              transition: .4s;
            }
            .btn-flat-border:hover {
              background: #FFA000;
              color: white;
            }
        </style>
    </head>
    <body>
        <div class="container flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-home"></i>ホーム</a>
                    @else

                    <!--テストユーザー　ショートカットログイン用-->
                    <div class="">

                    </div>
                    <form method='POST' action="{{ route('login') }}">
                      @csrf
                      <input id="email" type="hidden" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="e@example.com" required autofocus>
                      <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="yuya0201" required>
                      <button type="info" class="btn-flat-border">
                        <i class="fas fa-check"></i>{{ __(' テストユーザーログイン (ポートフォリオ閲覧用)') }}
                      </button>
                    </form>

                        <a href="{{ route('login') }}"><i class="fas fa-key"></i>ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>新規ユーザー登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    セルマネ
                </div>
                <div class="subtitle m-b-md">
                    自分を見える化して目標へコミットしよう
                </div>
            </div>
        </div>
    </body>
</html>
