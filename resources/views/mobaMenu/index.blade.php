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
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
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
            <a href="{{ asset('/') }}">
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
    
    <!-- galeria de imagenes -->
    <div class="contenedor__carrusel">   
        <div class="carousel">
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <div class="carousel__lista">
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/1.jpg') }} " alt="Rock and Roll Hall of Fame">
                        
                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/2.jpg') }} " alt="Constitution Square - Tower I">
                        
                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/3.jpg') }} " alt="Empire State Building">
                    
                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }} " alt="Harmony Tower">

                    </div>

                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/5.jpg') }} " alt="Empire State Building">
                    
                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/7.jpg') }} " alt="Harmony Tower">

                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/8.jpg') }} " alt="Empire State Building">
                        
                    </div>
                    <div class="carousel__elemento">
                        <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }} " alt="Harmony Tower">

                    </div>
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
            <div role="tablist" class="carousel__indicadores"></div>
        </div>  
        <div class="carousel2">
            <div class="carousel__contenedor2">
                <button aria-label="Anterior" class="carousel__anterior2">
                    <i class="fa-solid fa-angle-left"></i>
                </button>

                <div class="carousel__lista2">
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/1.jpg') }} " alt="Rock and Roll Hall of Fame">
                        
                    </div>
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/2.jpg') }} " alt="Constitution Square - Tower I">
                        
                    </div>
                    <div class="2">
                        <img src="{{ asset('Imagenes/imgs-gallery/3.jpg') }} " alt="Empire State Building">
                    
                    </div>
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }} " alt="Harmony Tower">

                    </div>

                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/5.jpg') }} " alt="Empire State Building">
                    
                    </div>
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/7.jpg') }} " alt="Harmony Tower">

                    </div>
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/8.jpg') }} " alt="Empire State Building">
                        
                    </div>
                    <div class="carousel__elemento2">
                        <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }} " alt="Harmony Tower">

                    </div>
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente2">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
            <div role="tablist" class="carousel__indicadores2"></div>
        </div>
    </div>
    

    


    <!-- Contenido de la página aquí -->
    <!-- script galeria -->
    <script>
        const fulImgBox = document.getElementById("fulImgBox"),
        fulImg = document.getElementById("fulImg");

        function openFulImg(reference){
            fulImgBox.style.display = "flex";
            fulImg.src = reference
        }
        function closeImg(){
            fulImgBox.style.display = "none";
        }
    </script>
    <!-- script carrusel -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('load', function(){
            new Glider(document.querySelector('.carousel__lista'), {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: '.carousel__indicadores',
                arrows: {
                    prev: '.carousel__anterior',
                    next: '.carousel__siguiente'
                },
                responsive: [
                    {
                    // screens greater than >= 775px
                    breakpoint: 450,
                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },{
                    // screens greater than >= 1024px
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                    }
                ]
            });
        });
        window.addEventListener('load', function(){
            new Glider(document.querySelector('.carousel__lista2'), {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: '.carousel__indicadores2',
                arrows: {
                    prev: '.carousel__anterior2',
                    next: '.carousel__siguiente2'
                },
                responsive: [
                    {
                    // screens greater than >= 775px
                    breakpoint: 450,
                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },{
                    // screens greater than >= 1024px
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                    }
                ]
            });
        });
    </script>

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

        /* --- --- CAROUSEL --- --- */
        .contenedor__carrusel{
            background-color: white;
            width: 80%;
            margin: 50px auto 50px;
                        
        }
        .carousel__contenedor {
            position: relative;
        }

        .carousel__anterior,
        .carousel__siguiente {
            position: absolute;
            display: block;
            width: 30px;
            height: 30px;
            border: none;
            top: calc(50% - 40px);
            cursor: pointer;
            line-height: 30px;
            text-align: center;
            background: none;
            opacity: 20%;
        }

        .carousel__anterior:hover,
        .carousel__siguiente:hover {
            opacity: 100%;
        }

        .carousel__lista {
            overflow: hidden;
        }

        .carousel__elemento {
            text-align: center;
            padding: 1%;
        }

        .carousel__indicadores .glider-dot {
            display: block;
            width: 30px;
            height: 4px;
            background: black;
            opacity: .2;
            border-radius: 0;
        }

        .carousel__indicadores .glider-dot:hover {
            opacity: .5;
        }

        .carousel__indicadores .glider-dot.active {
            opacity: 1;
        }

        /*Carrousel2*/
        .contenedor__carrusel2{
            background-color: white;
            width: 80%;
            margin: 50px auto 50px;
                        
        }
        .carousel__contenedor2 {
            position: relative;
        }

        .carousel__anterior2,
        .carousel__siguiente2 {
            position: absolute;
            display: block;
            width: 30px;
            height: 30px;
            border: none;
            top: calc(50% - 40px);
            cursor: pointer;
            line-height: 30px;
            text-align: center;
            background: none;
            opacity: 20%;
        }

        .carousel__anterior2:hover,
        .carousel__siguiente2:hover {
            opacity: 100%;
        }

        .carousel__lista2 {
            overflow: hidden;
        }

        .carousel__elemento2 {
            text-align: center;
            padding: 1%;
        }

        .carousel__indicadores2 .glider-dot {
            display: block;
            width: 30px;
            height: 4px;
            background: black;
            opacity: .2;
            border-radius: 0;
        }

        .carousel__indicadores2 .glider-dot:hover {
            opacity: .5;
        }

        .carousel__indicadores2 .glider-dot.active {
            opacity: 1;
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

            .contenido-principal {
                flex-direction: column;
            }

            .contenido-principal > * {
                width: 100%;
            }
            .contenido-principal2 {
                flex-direction: column;
            }

            .contenido-principal2 > * {
                width: 100%;
            }
            .logotexto{
                flex-direction: row;
            }
            .logotexto .logomoba img{
                width: 250px;
                height: 80px;
            }
        }
        
        @media screen and (max-width: 700px){
            .contenido-principal {
                flex-direction: column;
            }
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
        .container-fluid{
            padding: 0 !important;
        }

    </style>


@include('partials.footerMoba')
</body>

</html>
