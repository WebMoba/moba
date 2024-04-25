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
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
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
                <a href="{{ route('mobaMenu.index') }}" class="btn btn-primary ">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary active-link">Equipo de trabajo</a>
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
        <div class="box-1">
            <div class="texto">
               
                <h1 class="text"> EQUIPO DE TRABAJO </h1>

                <p class="p">
                    Este es el espacio donde seguramente una agencia diría que, en efecto, es una agencia. </p>
                <p class="p">
                    Nosotros nos consideramos una familia, porque estamos hechos de personas, con todo tipo de talentos.

                    En esta familia hay artistas, músicos, emprendedores, deportistas, en fin. Y es gracias a esa
                    calidad
                    humana y todo ese talento reunido que también hacemos publicidad, porque así ayudamos a nuestras
                    marcas a
                    tener un rol significativo en la vida de las personas. Así que si quieres hacer parte de nuestra
                    familia, eres
                    bienvenido.
                </p>
            </div>

        </div>


        <div class="box-2">
            <div class="contenido">

                <p class="text-white" style="text-align: justify; line-height: 1.5;">Y sí... </p>
                <p class="text-white" style="text-align: justify; line-height: 1.5;">Estos somos</p>
                <p class="text-1" style="text-align: justify; line-height: 1.5;">nosotros</p>
            </div>


            <div class="imagenes">
               
                <a href="{{ route('mobaMenu.EquipoTrabajo.integranteUno') }}" target="_blank" class="imagen-contenedor">
                    <img src="{{ asset('Imagenes/imgs-gallery/javier.jpg') }}" alt="Imagen 1" class="img-thumbnail">
                </a>
                
                <a href="{{ route('mobaMenu.EquipoTrabajo.integranteDos') }}" target="_blank" class="imagen-contenedor">
                    <img src="{{ asset('Imagenes/imgs-gallery/SOFIA_PEREZ.jpg') }}" alt="Imagen 2" class="img-thumbnail">
                </a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.integranteTres') }}" target="_blank" class="imagen-contenedor">
                    <img src="{{ asset('Imagenes/imgs-gallery/DAYANA_FONSECA.jpg') }}" alt="Imagen 3" class="img-thumbnail">
                </a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.integranteCuatro') }}" target="_blank" class="imagen-contenedor">
                    <img src="{{ asset('Imagenes/imgs-gallery/LINDA_PEREZ_1.jpg') }}" alt="Imagen 4" class="img-thumbnail">
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
        margin-top: 5%;
        display: flex;
        flex-direction: column;
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
        font-weight: 600;
    }

    .text {
        color: #2bb9e5;
        font-size: 280%;
        font-weight: bold;
        line-height: 1.5; 
        margin-bottom: 2;
    }

    .p {
        border-left: 5px solid #2bb9e5;
        padding-left: 10px;
        text-align: justify;
        line-height: 1.5;
        margin-bottom: 0;
    }

    .box-2 {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;

    }

    .text-1 {
        color: #2bb9e5;
        font-size: 140%;
        font-weight: bold;
        line-height: 1.5; 
        margin-bottom: 2;
        font-weight: 1000;
    }

    .contenido,
    .imagenes {
        #border: solid 3px red;
        height: 90%;
        width: 48%;
        font-size: 350%
        
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
        width: 40%;
        height: 40%;
        padding-top: 2%;
        padding-bottom: 2%;
        margin-block: 2%;
        margin-inline: 2%;
        transition: transform 0.3s ease;

    }

    .img-thumbnail:hover {
        transform: scale(1.2);
    }
    .container-fluid{
    padding: 0 !important;
}


</style>
