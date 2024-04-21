<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{ route('mobaMenu.Servicios.servicios') }}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Identidad
                                Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Avisos y
                                Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">POP y álgo
                                más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="#" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
            </a>
        </div>
    </nav>

    <!-- Líneas verticales con iconos -->
    <div class="vertical-line left-line">
        <hr class="linea1">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea1">
    </div>

    <!---------------------------------------------------------------------------------------------------------------->

    <div class="container">
        

        <div class="box-2">

            <div class="contenido">

                <h1 class="text-n" >Javier Mauricio Mojica </h1>
        
                <p class="text">
        
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident nulla explicabo quod perspiciatis eaque nesciunt corrupti accusantium ex excepturi atque? Ea doloribus reprehenderit totam nisi, ullam odio rem nesciunt minus.
                    
                </p>
                
            </div>


            <div class="imagenes">
               
                <a target="_blank" class="imagen-contenedor">
                    <img src="{{ asset('Imagenes/imgs-gallery/javier.jpg') }}" alt="Imagen 1" class="img-thumbnail">
                </a>
            </div>
            
        </div>

    </div>


    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <!-- Contenido de la página aquí -->

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
        
        
        // acción para realizar ampliación de la imagen

        const imagen = document.getElementById('imaimg-thumbnail');

        img-thumbnail.addEventListener('mouseover', () => {
            img-thumbnail.classList.add('imagen-ampliada');
        });

        img-thumbnail.addEventListener('mouseout', () => {
            img-thumbnail.classList.remove('imagen-ampliada');
        });
    </script>
</body>

</html>

<style>
    .container {
        height: 100vh;
        width: 95%;
        # border: solid 3px yellow;
        margin-top: 10%;
        display: flex;
        flex-direction: column;
    }

    .box-1,
    .box-2 {
        # border: solid 3px blue;
        height: 100%;
        width: 95% display: inline-block;


    }

    .box-1 {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin-top: 2%;

    }

    .texto {
        # border: solid 3px red;
        height: 90%;
        width: 90%;
        text-align: center;
        color: #BCCCE0;
        margin-top: 0%;
        font-size: 110%;
        margin-left: 10%;
        margin-right: 5%;
        padding: 2%;
    }

    

  

    .box-2 {
        #border: solid 3px red;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        

    }
    .text-n {
        color: #2bb9e5;
        padding-top: 2%;
        padding-bottom: 3%;
        font-size: 300%;
        font-weight: bold;
        text-align: justify;
        line-height: 1.5;
        
    }

    .text {
        color:#ccc;
        padding-top: 5%;
        font-size: 160%;
        font-weight: bold;
        text-align: justify;
        line-height: 1.5;
    }

    .contenido,
    .imagenes {
        #border: solid 3px red;
        height: 90%;
        width: 48%;
        
    }

    .imagenes {
        margin-left: 3%;
        margin-right: 2%;
        padding-top: 1%;
        border-radius: 10px;
        position: relative;
        display: inline-block;


    }

    .imagenes img {
        background-color: #ccc;
        border: solid 2px #ccc;
        width: 100%;
        height: 100%;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-block: 2%;
        margin-inline: 2%;
        transition: transform 0.3s ease;

    }

    #.img-thumbnail:hover {
        transform: scale(0.8);
    }
</style>
