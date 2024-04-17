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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="background-image">

    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
            <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba">
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
                <a href="{{ route('mobaMenu.index')}}" class="btn btn-primary">Nosotros</a>
                <a href="#" class="btn btn-primary">Proyectos</a>
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
            <div class="logomoba">
                <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba">
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
    <!-- buena onda-->
    <div class="onda">
            <h1>"Buena Onda"</h1>
    </div>
    
    <!-- galeria de imagenes -->

    <div class="img-gallery">
        <img src="{{ asset('Imagenes/imgs-gallery/1.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/2.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/3.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/5.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/6.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/7.jpg') }} " onclick="openFulImg(this.src)" alt="">
        <img src="{{ asset('Imagenes/imgs-gallery/8.jpg') }} " onclick="openFulImg(this.src)" alt="">
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
            width: 65%;
            height: 80%;
        }

        .logotexto .logomoba{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45%;
            height: 80%;
        }


        .logotexto .texto p{
            font-size:larger;
            color: white;
            text-align: justify;
            width: 80%;
        }


        .logotexto .logomoba img{
            width: 300px;
            height: 100px;
        }
        
        /* buena onda */
        .onda{
            display: flex;
            align-items: center;
            justify-content: center;
            padding-right: 20%;
        }
        .onda h1{
            font-size: 50px;
            font-weight: bold;
            color: white;
        }


        /* galeria imagenes */
        .img-gallery{
            background-color: white;
            width: 80%;
            margin: 50px auto 50px;
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(240px,1fr));
            gap: 30px;
        }
        .img-gallery img{
            width: 100%;
            cursor: pointer;
            transition: 1s;
            padding: 1rem;
        }
        .img-gallery img:hover{
            transform: scale(1.1);
        }
        .ful-img{
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0,0, 0.9);
            position: fixed;
            top: 0;
            left: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 99;
        }
        .ful-img span{
            position: absolute;
            top: 5%;
            right: 5%;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
        }
        .ful-img img{
            width: 90%;
            max-width: 600px;
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
        }
    </style>



</body>

</html>
