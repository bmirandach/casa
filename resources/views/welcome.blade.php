<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>¿Qué hay en casa?</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!--  verrrrrrrrrrrrrrrrrrrrrrrrrr 
            https://www.bishopmgmt.com/wp-content/uploads/sites/7879/2018/03/iStock-693745670-e1520619458744.jpg
        <link rel="stylesheet" type="text/css" href="css/welcome.css">-->




        <!-- Styles -->
        <style>
            html, body {
                background-image: url(/img/bgm-welcome.jpg);
                background-color: #fff;
                color: #636b6f;
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
                color: #32C74D;
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
        <div class="flex-center position-ref full-height" >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endauth
                </div>
            @endif

            <div class="content" >
                <div class="title m-b-md">
                    ¿Qué hay en casa?
                </div>

                <h3><img class="feature-icon" src="/img/icon-time.png">Ahorrás tiempo</h3>
                <h3><img class="feature-icon" src="/img/handshake.png">Todos en casa pueden colaborar</h3>
                <h3><img class="feature-icon" src="/img/search.png">Consultar es fácil</h3>
            </div>
        </div>
    </body>
</html>