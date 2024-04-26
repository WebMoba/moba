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
</head>

<body class="background-image">

    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Accesorios.index') }}">Accesorios</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Decoracion.index') }}">Decoracion</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.JoditasPalRecuerdo.index') }}">Joditas pa'l
                                Recuerdo</a></li>
                        <li><a class="dropdown-item"
                                href="{{ route('tuArteMenu.servicios.Mascotas.index') }}">Mascotas</a></li>
                    </ul>
                </div>
                <a href="{{ route('tuArteMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('tuArteMenu.categorias.index') }}"class="btn btn-primary">Categorias</a>
                <a href="{{ route('tuArteMenu.galeria.index') }}" class="btn btn-primary active-link">Galeria</a>
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
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











    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators ">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active "
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Gallery -->
                <div class="container col-lg-9">
                    <div class="lightbox" data-mdb-lightbox-init>
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img1.jpeg') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img2.jpg') }}"
                                    alt="Coconut with Strawberries" class="w-100 shadow-1-strong " />
                            </div>
                            <div class="col-lg-8">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img3.webp') }}"
                                    alt="Dark Roast Iced Coffee" class="w-100 shadow-1-strong" />
                            </div>
                            <div class="mt-4 col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img4.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class=" ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img5.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class="ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img6.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Gallery -->
            </div>
            <div class="carousel-item">
                <!-- Gallery -->
                <div class="container col-lg-9">
                    <div class="lightbox" data-mdb-lightbox-init>
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img3.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img2.jpg') }}"
                                    alt="Coconut with Strawberries" class="w-100 shadow-1-strong " />
                            </div>
                            <div class="col-lg-8">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img1.jpeg') }}"
                                    alt="Dark Roast Iced Coffee" class="w-100 shadow-1-strong" />
                            </div>
                            <div class="mt-4 col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img4.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class=" ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img6.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class="ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img4.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Gallery -->
            </div>
            <div class="carousel-item">
                <!-- Gallery -->
                <div class="container col-lg-9">
                    <div class="lightbox" data-mdb-lightbox-init>
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img4.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img3.webp') }}"
                                    alt="Coconut with Strawberries" class="w-100 shadow-1-strong " />
                            </div>
                            <div class="col-lg-8">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img6.webp') }}"
                                    alt="Dark Roast Iced Coffee" class="w-100 shadow-1-strong" />
                            </div>
                            <div class="mt-4 col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img5.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class=" ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img1.jpeg') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>
                            <div class="ult col-lg-4">
                                <img src="{{ asset('Imagenes/img-tuArte-gallery/Img4.webp') }}"
                                    alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong" />
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Gallery -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>











 @include('partials.footerTuArte')
</body>

</html>



<style> 
 .active-link {
        position: relative;
        color:red;
    }

    .active-link:after {
        color:red;
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px; /* Grosor de la línea */
        background-color: red; /* Color de la línea */
    }
    /* Estilos para los botones de indicadores */
    .carousel-indicators [data-bs-target] {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ff0000;
        margin: 0 10px;
    }

    /* Estilos para el contenedor de los indicadores */
    .carousel-indicators {
        margin-bottom: -30px;
    }

    /* ------Estilo de galeria ----------*/
    .container {
        margin-top: 9em;
    }

    .col-lg-8 img {
        height: 40em;
    }

    .col-lg-4 img {
        height: 21em;
    }

    .mt-4 img {
        height: 17.8em;
    }

    .ult img {
        height: 21em;
        margin-top: -1.9em;
    }

    .container img {
        border: 2px solid #d9534f;
    }

    body {
        background-color: #333333;
    }

    .container img {
        object-fit: cover;
        /* Ajusta la imagen manteniendo la relación de aspecto, cubriendo el contenedor */
    }

    /* ---------- */

    .dropdown-menu .dropdown-item:hover {
        background-color: transparent !important;
        border-color: transparent !important;
        border: none;
        text-shadow: 0 0 5px #f80008;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: rgba(255, 0, 0, 0.274) !important;
        /* Cambia el color de fondo al pasar el cursor sobre las opciones del menú */
    }

    .dropdown-item:hover {
        color: #f80008 !important;
    }

    .dropdown-menu {
        background-color: transparent !important;
        border-color: #73a3b6 !important;
    }

    .dropdown-menu .dropdown-item {
        color: #f80008 !important;
        background-color: transparent !important;
        border-color: #f80008 !important;
    }

    .dropdown-menu .dropdown-divider {
        border-top: 1px solid #f80008;
    }
    .container-fluid{
        padding: 0 !important;
    }
    
    
</style>
