<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="{{ asset('Imagenes/Logotipo Moba-06.png') }}">
    <title>
        Moba / TuArte
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/StyleBotones')}}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter') }}">

    <!-- Styles -->
    <style>




    </style>
</head>

<body class="antialiased" style="background-color: black;">


    <div class = "container">

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
            @if (Route::has('login'))
                <div class="nav" style="display:flex;justify-content: end;">
                <a href="{{ url('documentos/ManualUsuario.pdf') }}" class="circle-btn" target="_blank">?
            <span class="tooltiptext">Ayuda</span>
        </a>
                    @auth

                    <a href="{{ url('/dashboard') }}" class="letter">Inicio</a>
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        
                        <a href="{{ route('logout') }}" class="letter"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="letter">Ingresar </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="letter">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif


            <!-- Contenido -->
            <div class="logo">
                <!-- Logo instagram y facebook   -->
                <div class="links">
                    <div class="linea grey"></div> <!-- Línea vertical antes de los logos -->
                    <div class="columna">
                        <div class="logoRedes">
                            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><img
                                    src="{{ asset('Imagenes/imgPrincipalView/facebookGris.png') }}"
                                    alt="Logo de Facebook"></a>
                        </div>
                        <div class="logoRedes">
                            <a href="https://www.instagram.com/moba_agencia"> <img
                                    src="{{ asset('Imagenes/imgPrincipalView/instagramGris.png') }}"
                                    alt="Logo de Instagram"></a>
                        </div>
                    </div>
                    <div class="linea grey"></div> <!-- Línea vertical después de los logos -->
                </div>
                <!-- Insersion de imagenes  -->
                <a href="{{ route('mobaMenu.index') }}" class="logos">
                    <div class="logos"><img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" alt="Imagen"></div>
                </a>

                <a href="{{ route('tuArteMenu.index') }}" class="logos">
                    <div class="logos"><img src="{{ asset('Imagenes/imgPrincipalView/LogotipoTuArte.png') }}"
                            alt="Imagen" id="img2"></div>
                </a>


                <div class="links">
                    <div class="linea"></div> <!-- Línea vertical antes de los logos -->
                    <div class="columna">
                        <div class="logoRedes">
                            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><img
                                    src="{{ asset('Imagenes/imgPrincipalView/facebookRojo.png') }}"
                                    alt="Logo de Facebook"></a>
                        </div>
                        <div class="logoRedes">
                            <a href="https://www.instagram.com/moba_agencia"> <img
                                    src="{{ asset('Imagenes/imgPrincipalView/instagramRojo.png') }}"
                                    alt="Logo de Instagram"></a>
                        </div>
                    </div>
                    <div class="linea"> </div> <!-- Línea vertical después de los logos -->
                </div>
            </div>
        </div>
        <!-- Contenido -->

    </div>
    </div>
    </div>
    </div>
</body>

</html>

<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        /* 100% del viewport height */
        background-color: black;
        display: flex;
        flex-direction: column;
    }

    .container {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .nav {
        height: 5vh;
        text-align: right;
        padding: 20px 10px 1px 1px;
    }

    .letter {
        font-size: 14.4px;
        font-family: Nunito, sans-serif;
        color: white;
        text-decoration: none;
        margin-right: 10px;
    }

    .letter:hover {
        color: grey;
    }

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 90vh;
        width: 100%;
    }

    .logos {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45%;
        height: 95%;
        perspective: 1000px;
        /* Ajusta la perspectiva para el efecto 3D */
    }

    /* Ajustar el ancho y alto de la imagen Moba */
    .logos img {
        width: 130%;
        height: 60%;
        max-width: 100%;
        max-height: 100%;
        transition: transform 0.7s;
        cursor: pointer;
    }

    .logos img:hover {
        transform: scale(1.2);
    }

    /* Ajustar el ancho y alto de la imagen tu arte */
    #img2 {
        width: 100%;
        height: auto;
        max-width: 100%;
        max-height: 100%;
    }

    #img2:hover {
        transform: scale(1.2);
    }

    .links {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 5%;
        height: 80%;
    }

    .logoRedes img {
        width: 20px;
        height: 20px;
        margin-bottom: 10px;
    }

    .linea {
        border: none;
        border-left: 1px solid #F21630;
        /* Estilo de la línea vertical */
        height: 50%;
        /* Altura de la línea */
        margin: 10px 0;
        /* Espacio entre la línea y los elementos */
    }

    .linea.grey {
        border-left: 1px solid #BCCCE0;
    }

    @keyframes pulse-opacity {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes spin-horizontal {
        0% {
            transform: rotateY(0deg);
        }

        50% {
            transform: rotateY(85deg);
        }

        100% {
            transform: rotateY(-85deg);
        }
    }

    .logos img {
        animation: pulse-opacity 3s ease-in-out infinite, spin-horizontal 15s linear infinite;
        transform-style: preserve-3d;
        /* Importante para la perspectiva 3D */
    }

    .logos div {
        transform-style: preserve-3d;
    }

    .circle-btn {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1.5px solid;
        background-color: transparent;
        color: white;
        text-align: center;
        line-height: 18px;
        font-size: 15px;
        margin-right: 15px;
        transition: background-color 0.3s;
    }

    .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1000;
        /* Asegúrate de que el tooltip esté por encima de otros elementos */
        bottom: 125%;
        left: 50%;
        margin-left: -60px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .circle-btn:hover .tooltiptext,
    .circle-btn:focus .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    @media (max-width: 768px) {
        .logos img {
            width: 100%;
            height: 50%;
        }

        #img2 {
            width: 90%;
        }
    }

    @media (max-width: 480px) {
        .logos img {
            width: 100%;
            height: 40%;
        }

        #img2 {
            width: 80%;
        }
    }
</style>







