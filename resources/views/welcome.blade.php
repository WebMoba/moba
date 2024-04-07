<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

              <!-- Insersion de imagenes  -->
            <div class="logos"><img src="{{ asset('storage/imgMoba/LogoMoba.png') }}" alt="Imagen"></div>
            <div class="logos"><img src="{{ asset('storage/imgMoba/LogotipoTuArte.png') }}" alt="Imagen" id="img2"></div>
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

        /* Ajustar el ancho y alto de la imagen 1 */
        .logos img {
        width: 90%; 
        height: 55%;
        transition: width 0.7s, height 0.7s; 
        cursor: pointer;
        }
        /* Ajustar el ancho y alto de la imagen 1 */
        #img2{
            width: 60%;
            height: 95%
        }
        .logos img:hover{
            width: 92%;
            height: 57%
        }
        #img2:hover{
            width: 62%;
            height: 97%
        }
</style>