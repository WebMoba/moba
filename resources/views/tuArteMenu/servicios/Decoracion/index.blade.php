<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/AccesoriosTuArte.css') }}">
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
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        aria-haspopup="true" aria-expanded="false" href="{{ route('tuArteMenu.servicios.index') }}">
                        Servicios
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Accesorios.index') }}">Accesorios</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Decoracion.index') }}">Decoracion</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.JoditasPa´lRecuerdo.index') }}">Joditas pa'l
                                Recuerdo</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Mascotas.index') }}">Mascotas</a></li>
                    </ul>
                </div>
                <a href="{{ route('tuArteMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('tuArteMenu.categorias.index') }}"class="btn btn-primary">Categorias</a>
                <a href="{{ route('tuArteMenu.galeria.index') }}" class="btn btn-primary">Galeria</a>
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
    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <!-- Contenido de la página aquí -->

    <div class="title-container">
        <h1 class="big-title">DECORACIÓN</h1>
    </div>
    <div class="txt1">
        <h1 class="txts1">¿Buscas accesorios que vayan perfecto con tu personalidad?</h1>
    </div>
    <div class="txt2">
        <h1 class="txts2">¡Has llegado al lugar indicado!</h1>
    </div>
    <div class="txt3">
        <h1 class="txts3">Nuestra Creatividad y enfoque en hacer productos unicos, hacen que tengamos en nuestro
            portafolio piezas con las que te vas a identificar y que sin duda querras tener en tu joyero.</h1>
        <h1 class="txts3">En esta línea encuentras aretes largos, aretes topitos, dijes, manillas, pines, anillos.</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10"> <!-- Ajusta el ancho del carrusel -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Imágenes del carrusel -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/1.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/2.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/3.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/5.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/6.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/7.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('Imagenes/imgs-gallery/8.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Flechas de navegación -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
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
    <script>
        // Espera a que el documento esté completamente cargado
        document.addEventListener("DOMContentLoaded", function() {
            // Selecciona el carrusel por su ID
            var myCarousel = document.getElementById('carouselExampleControls');

            // Inicializa el carrusel con opciones personalizadas
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 3000, // Intervalo de desplazamiento en milisegundos
                wrap: true // Permite el desplazamiento continuo
            });
        });
    </script>
</body>

</html>


<style>
    .dropdown-menu .dropdown-item:hover {
        background-color: transparent !important;
        border-color: transparent !important;
        border: none;
        text-shadow: 0 0 5px #f80008;
    }

    .dropdown-item:hover {
        color: #f80008 !important;
    }

    .dropdown-menu {
        background-color: transparent !important;
        border-color: #f80008 !important;
    }

    .dropdown-menu .dropdown-item {
        color: #f80008 !important;
        background-color: transparent !important;
        border-color: #f80008 !important;
    }

    .dropdown-menu .dropdown-divider {
        border-top: 1px solid #f80008;
    }

    .carousel-container {
        background-color: red;
        /* Color del rectángulo rojo */
        padding: 20px;
        /* Espacio alrededor del carrusel */
        margin-top: 100px;
        /* Espacio superior */
        text-align: center;
        /* Centrar texto */
    }

    .carousel-item {
        display: none;
        /* Ocultar todas las imágenes por defecto */
    }

    .carousel-item.active {
        display: block;
        /* Mostrar la imagen activa */
    }

    /* Estilos para el texto debajo de las imágenes */
    .carousel-caption {
        color: white;
        /* Color del texto */
        font-size: 18px;
        /* Tamaño de la fuente */
        margin-top: 10px;
        /* Espacio superior */
    }

    /* Estilos para las flechas de navegación */
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        background: none;
    }
</style>
