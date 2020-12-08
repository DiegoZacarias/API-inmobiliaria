<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="/css/app.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #273c75;
                color: #dcdde1;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #718093;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
              color: #f5f6fa;
              transition: opacity .2s ease-out;
              -moz-transition: opacity .2s ease-out;
              -webkit-transition: opacity .2s ease-out;
              -o-transition: opacity .2s ease-out;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .active > a{
                color: white;
            }

        </style>
    </head>
    <body>
        <div class="flex-top position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            @yield('content')


           
        </div>
            <div id="app">
                <div class="container mx-auto">
                    <aside class="links">
                        <router-link to="/producto" class="nav-item" active-class="active">Productos</router-link>
                        <router-link to="/panel" class="nav-item" active-class="active">Panel</router-link>
                    </aside>

                    <div class="primary" style="margin-top: 4rem;">
                        <router-view></router-view>
                    </div>

                </div>
            </div>

        <script src="/js/app.js"></script>
    </body>
</html>
