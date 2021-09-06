<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ZK ADMIN PANEL</title>

        <link rel="icon" href="{{ asset('img/zklogo.png') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/valorant" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            #bg-logo {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background-image: url('/img/zk-opacity.png');
                background-position-y: 20vh;
                background-position-x: -25vh;
                background-repeat: no-repeat;
                background-size: 100vh;
                z-index: -1;
                opacity: 0.3;
            }

            @import url('http://fonts.cdnfonts.com/css/valorant');

            .title-section {
                text-align: center;
                font-family: Valorant, Montserrat;
                font-size: 50px;
            }
        </style>
    </head>
    <body>

        <div id="bg-logo"></div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/adminzk">
                    Admin Panel
                    <img src="{{ URL::to('/img/zklogo.png') }}" style="height: 50px" alt="ZK">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/adminzk/noticias">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/adminzk/calendario">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/adminzk/media">Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/adminzk/jugadores">Jugadores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/adminzk/banners">Banners</a>
                        </li>
                    </ul>
                    <div class="navbar-text"> 
                        {{ Auth::user()->name }} - 
                        <a href="/adminzk/logout"> Logout </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            @yield('content')
        </div>
    </body>
</html>
