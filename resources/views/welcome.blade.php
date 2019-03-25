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
        </style>
    </head>
    <body>
        <div class="container flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-home"></i>ホーム</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規ユーザー登録</a>
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
