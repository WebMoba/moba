<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/StylesServicios/MascotasTuArte.css') }}">
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
        <h1 class="big-title">MASCOTAS</h1>
    </div>
    <div class="txt1">
        <h1 class="txts1">¿Buscas una pieza artesanal que transmita el amor real por tu mascota?</h1>
    </div>
    <div class="txt2">
        <h1 class="txts2">¡Has llegado al lugar indicado!</h1>
    </div>
    <div class="txt3">
        <h1 class="txts3">Si alguna vez has pensado en piezas para ti o para regalar, que transmitan el amor real que
            sentimos por
            esos seres que nos acompañan a diario y que llamamos mascotas, has entrado a la pagina correcta.</h1>
        <h1 class="txts3">Nuestros clientes aman a sus mascotas y con está línea expresamos todo el amor hacia ellos
            todos nuestros
            productos los personalizamos con la fotografía de nuestros amigos.</h1>
    </div>
    <!---Carrusel--->
    <div class="carousel-container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/1.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">COLLAR STICH</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/2.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ARETES PAISAJE</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/3.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ARETES PERRO</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/4.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ANILLO PAISAJE</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Agrega más imágenes aquí -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/5.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">COLLAR BOYACA</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/6.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ARETES LUNA</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/7.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ARETES CARACOLA</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="red-box">
                                <img src="{{ asset('Imagenes/imgs-gallery/8.jpg') }}" class="d-block w-100">
                            </div>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="rating-text">
                                <p class="textName">ANILLO GATO</p>
                                <p class="textValue">$10.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const starsContainers = document.querySelectorAll('.stars');

            starsContainers.forEach(starsContainer => {
                const stars = starsContainer.querySelectorAll('i');

                stars.forEach((star, index) => {
                    star.addEventListener('click', function() {
                        // Remover la clase 'active' de todas las estrellas
                        stars.forEach((s, i) => {
                            if (i <= index) {
                                s.classList.add(
                                    'active'
                                ); // Agregar la clase 'active' a las estrellas hasta la seleccionada
                            } else {
                                s.classList.remove('active');
                            }
                        });
                    });
                });
            });
        });
    </script>
</body>

</html>
