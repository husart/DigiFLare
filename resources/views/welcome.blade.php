<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DigiFlare</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .fadein {
                font-size: 84px;
                -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
                -moz-animation: fadein 2s; /* Firefox < 16 */
                -ms-animation: fadein 2s; /* Internet Explorer */
                -o-animation: fadein 2s; /* Opera < 12.1 */
                animation: fadein 2s;
            }

            @keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Firefox < 16 */
            @-moz-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Safari, Chrome and Opera > 12.1 */
            @-webkit-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Internet Explorer */
            @-ms-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Opera < 12.1 */
            @-o-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                     <a href="{{ route('list') }}">List</a>
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md fadein">
                    DigiFlare
                </div>

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
    </body>
</html>
