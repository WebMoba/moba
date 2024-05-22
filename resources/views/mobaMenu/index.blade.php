<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
</head>

<body class="background-image">

    <nav class="navbar">
             <!--- inicio breaddrums-->
    <div class="breadcrums">
        @include('helpers.breadcrumbs', ['breadcrumbs' => [
        ['url' => route('welcome'), 'label' => 'Bienvenido /'],
        ['url' => route('mobaMenu.index'), 'label' => 'Moba /'],
        ['url' => route('mobaMenu.index'), 'label' => 'Nosotros'],]])
        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>
<!--- final breaddrums-->
        <div class="container-fluid">
        <a href="{{ route('mobaMenu.index')}}">
            <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{route('mobaMenu.Servicios.servicios')}}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index')}}" class="btn btn-primary active-link">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
            <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
            </a>
        </div>
   

    </nav>
    <div class="content">
        <div class="vertical-line left-line">
            <hr class="linea1">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea1">
        </div>

        <div class="logotexto">
            <div class="textonda">
                <div class="texto">
                    <p>MOBA surge como una propuesta novedosa apostándole a la creatividad y a la imaginación, 
                        para satisfacer las necesidades de las marcas y los clientes.</p>
                    <br>
                    <p>Con 8 años de experiencia, somos un referente en diseño, comunicación y publicidad; 
                        contamos con talento humano capaz de crear estructuras, desarrollar e implementar campañas 
                        eficaces en medios impresos y digitales.</p>
                    <br>
                    <p>Los pilares y bases de nuestro trabajo, estan regidos por la honestidad, la disiplina y la...</p>
                </div>
                <!-- buena onda-->
                <div class="onda">
                        <h1>"Buena Onda"</h1>
                </div>
            </div>
            <div class="logomoba">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </div>
        </div>
    
        <div class="vertical-line right-line">
            <hr class="linea2">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea2">
        </div>
    </div>
    <!-- Líneas verticales con iconos -->
    
    
    <div class="container-slider">
        <div class="slider-background">  
            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/1.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/1.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/2.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/2.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/3.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/3.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/4.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/4.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/5.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/5.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/6.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/6.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/7.jpeg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/7.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="slider">
                <div class="slide-track">
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/8.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/8.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/9.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/9.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/14.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/13.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/10.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/10.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/11.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/11.jpg') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/12.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/12.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Tarjetas/13.png') }}" alt="">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('Imagenes/imgs-gallery/Logos/4.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.querySelector('.dropdown').addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });

        document.querySelector('.dropdown').addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    </script>

    <style>
        /* frase y logo */
        .content{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .active-link {
            position: relative;
            color:#2bb9e5;
        }
        
        .active-link:after {
            color:#2bb9e5;
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px; /* Grosor de la línea */
            background-color: blue; /* Color de la línea */
        }

        .logotexto{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 80%;
            height: 100%;
            margin-top:9%;
        }
        .logotexto .texto{
            width: 100%;
            height: 80%;
        }

        .logotexto .logomoba{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35%;
            height: 80%;
            padding-bottom: 10%;
            padding-right: 15%;
        }


        .logotexto .texto p{
            font-size:larger;
            color: white;
            text-align: justify;
            width: 80%;
        }


        .logotexto .logomoba img{
            width: 410px;
            height: 150px;
        }
        
        .textonda{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 65%;
            height: 90%;
            flex-direction: column
        }
        /* buena onda */
        .onda{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .onda h1{
            font-size: 60px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .container-fluid{
            padding: 0 !important;
        }

        /*carrousel infinito*/
        .container-slider{
            width:100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .slider-background{
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
        }
        .slider {
            width: 95%;
            height: auto;
            overflow: hidden;
            margin-bottom: 2%;
            margin-top: 2%;
        }
        
        .slider .slide-track {
            display: flex;
            animation: scroll 50s linear infinite;
            -webkit-animation: scroll 50s linear infinite;
            width: calc(200px * 14);
        }
        
        .slider .slide {
            width: 200px;
        }
        
        .slider .slide img {
            width: 100%;
            padding-right: 5%;
        }

        @media screen and (max-width:1200px){
            .logotexto .logomoba img{
                width: 350px;
                height: 150px;
            }
            .logotexto .logomoba{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 35%;
                height: 80%;
                padding-bottom: 10%;
            }
        }

        @media screen and (max-width: 1000px) {
            .logotexto{
                flex-direction: row;
            }
            .logotexto .logomoba img{
                width: 300px;
                height: 100px;
            }
        }

        @media screen and (max-width: 900px) {
            
            .logotexto{
                flex-direction: row;
            }
            .logotexto .logomoba img{
                width: 250px;
                height: 80px;
            }
        }
        
        @media screen and (max-width: 700px){
            .logotexto{
                flex-direction: row;
            }
            .logotexto .logomoba img{
                width: 180px;
                height: 80px;
            }
            .onda h1{
                font-size: 40px;
                font-weight: bold;
                color: white;
            }
            .logotexto .texto p{
                font-size:10px;
                color: white;
                text-align: justify;
                width: 80%;
                padding-top: 10%;
            }
        } 

        @media screen and (max-width:520px){
            h1{
                text-decoration: underline;
            }
            h1::before{
                display: none;  
            }
            h1 span{
                padding: 0;
            }
            .logotexto .texto p{
                font-size:10px;
                color: white;
                text-align: justify;
                width: 80%;
                padding-top: 15%;
            }
            .logotexto{
                flex-direction: column;
            }
            .logotexto .logomoba img{
                width: 150px;
                height: 60px;
            }
            .onda h1{
                font-size: 30px;
                font-weight: bold;
                color: white;
            }
        }
        
        @media screen and (max-width:400px){
            h1{
                text-decoration: underline;
            }
            h1::before{
                display: none;  
            }
            h1 span{
                padding: 0;
            }
            .logotexto .texto p{
                font-size:10px;
                color: white;
                text-align: justify;
                width: 80%;
                padding-top: 20%;
            }
            .logotexto{
                flex-direction: column;
            }
            .logotexto .logomoba img{
                width: 150px;
                height: 60px;
            }
            .onda h1{
                font-size: 30px;
                font-weight: bold;
                color: white;
            }
        }
        
        @keyframes scroll {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
            }
            100% {
                -webkit-transform: translateX(calc(-200px * 7));
                transform: translateX(calc(-200px * 7));
            }
        }


        .breadcrums {
    display: flex;
}

.breadcrums a {
    text-decoration: none;
    color: white;
    font-size: 0.9vw;
    margin-right: 2px; /* Esto agrega un espacio entre los enlaces */
}

.breadcrumbs li {
    display: inline;
    padding: 0;
}

.breadcrumbs a:hover{
    color:  #2bb9e5;
}

    </style>


@include('partials.footerMoba')
</body>

</html>
