<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moba</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
           


                
        </style>
    </head>
    <body class="antialiased" style="background-color: black;">


    <div class = "container">
    
       <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen " >
            @if (Route::has('login'))

            
            <div class="nav">
                  
                    @auth
                        <a href="{{ url('/dashboard') }}" class="letter">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="letter" >Ingresar </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="letter" >Registrarse</a>
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
                        <img src="{{ asset('storage/imgMoba/facebookGris.png') }}" alt="Logo de Facebook">
                    </div>
                    <div class="logoRedes">
                        <img src="{{ asset('storage/imgMoba/instagramGris.png') }}" alt="Logo de Instagram">
                    </div>
                </div>
                <div class="linea grey"></div> <!-- Línea vertical después de los logos -->
            </div>
              <!-- Insersion de imagenes  -->
            <a href="{{ route('mobaMenu.index') }}" class="logos">
            <div class="logos"><img src="{{ asset('storage/imgMoba/LogoMoba.png') }}" alt="Imagen"></div>
            </a>

            <a href="{{ route('tuArteMenu.index') }}" class="logos">
            <div class="logos"><img src="{{ asset('storage/imgMoba/LogotipoTuArte.png') }}" alt="Imagen" id="img2"></div>
            </a>


            <div class="links">
            <div class="linea"></div> <!-- Línea vertical antes de los logos -->
                <div class="columna">
                    <div class="logoRedes">
                        <img src="{{ asset('storage/imgMoba/facebookRojo.png') }}" alt="Logo de Facebook">
                    </div>
                    <div class="logoRedes">
                        <img src="{{ asset('storage/imgMoba/instagramRojo.png') }}" alt="Logo de Instagram">
                    </div>
                </div>
                <div class="linea"></div> <!-- Línea vertical después de los logos -->
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
            height: 100vh; /* 100% del viewport height */
            background-color: black;
        }
        .container {
            
            height: 100%; /* Ajuste la altura del contenedor al 100% */
       
        }
        .nav {
          
            height: 5vh;
            text-align: right;
            padding:20px 10px 1px 1px;
            
            
        }
        .letter{
            font-size: 14.4px Nunito, sans-serif;
            color: white;
            text-decoration: none;
            margin-right: 10px;
        }
        .letter:hover{
            color: grey;
        }
        .logo{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60vh;
            width: 100%;
            margin-top: 8%;
            
        }
        .logos{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45%;
            height: 95%;
          
        }

        /* Ajustar el ancho y alto de la imagen Moba */
        .logos img {
            width: 90%; 
            height: 35%;
            transition: width 0.7s, height 0.7s; 
            cursor: pointer;
        }
       
        .logos img:hover{
            width: 95%;
            height: 40%
        }

         /* Ajustar el ancho y alto de la imagen tu arte */
         #img2{
            width: 90%;
            height: 85%
        }
        #img2:hover{
            width: 95%;
            height: 90%
        }
        .links{
            display: flex;
            flex-direction: column; /* Establecer el diseño en columna */
            align-items: center; /* Centrar verticalmente los elementos */
            justify-content: center;
            width: 5%;
            height: 80%;
        }
        .logoRedes img{
            width: 20px;
            height: 20px;
            margin-bottom: 10px;
        }
        .linea{
            border: none;
            border-left: 1px solid #F21630; /* Estilo de la línea vertical */
            height: 50%; /* Altura de la línea */
            margin: 10px 0; /* Espacio entre la línea y los elementos */
        }
        .linea.grey{
            border-left: 1px solid #BCCCE0;
        }
</style>