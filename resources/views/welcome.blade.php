<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moba</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles -->
    <style>




    </style>
</head>

<body class="antialiased" style="background-color: black;">


    <div class = "container">

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen ">
            @if (Route::has('login'))


                <div class="nav">

                    @auth
                        <a href="{{ url('/dashboard') }}" class="letter">Inicio</a>
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
    }

    .container {

        height: 100%;
        /* Ajuste la altura del contenedor al 100% */

    }

    .nav {

        height: 5vh;
        text-align: right;
        padding: 20px 10px 1px 1px;


    }

    .letter {
        font-size: 14.4px Nunito, sans-serif;
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
        height: 60vh;
        width: 100%;
        margin-top: 8%;

    }

    .logos {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45%;
        height: 95%;
        perspective: 1000px; /* Ajusta la perspectiva para el efecto 3D */

    }

    /* Ajustar el ancho y alto de la imagen Moba */
    .logos img {
        width: 120%;
        height: 65%;
        transition: width 0.7s, height 0.7s;
        cursor: pointer;
    }

    .logos img:hover {
        width: 140%;
        height: 85%
    }

    /* Ajustar el ancho y alto de la imagen tu arte */
    #img2 {
        width: 90%;
        height: 85%
    }

    #img2:hover {
        width: 110%;
        height: 105%
    }

    .links {
        display: flex;
        flex-direction: column;
        /* Establecer el diseño en columna */
        align-items: center;
        /* Centrar verticalmente los elementos */
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
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }

    @keyframes spin-horizontal {
        0% { transform: rotateY(0deg); }
        50% { transform: rotateY(85deg); }
        100% { transform: rotateY(-85deg); }
    }

.logos img {
    animation: pulse-opacity 3s ease-in-out infinite, spin-horizontal 15s linear infinite;
    transform-style: preserve-3d; /* Importante para la perspectiva 3D */
}
.logos div {
        transform-style: preserve-3d;
    }
</style>
