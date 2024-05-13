<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Imagenes/LogoTuArte.png') }}">
    <title>
        TuArte
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/StylesServicios/DecoracionTuArte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body style="position: relative;">
    <div
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/FondoPrueba.png') }}'); background-size: cover; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: -1; filter: brightness(30%); -webkit-filter: brightness(30%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.servicios.Decoracion.index'), 'label' => 'Servicios / Decoracion'],
                ],
            ])
        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>
<!--- final breaddrums-->
        <div class="container-fluid">
            <a href="{{ route('mobaMenu.index') }}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="" class="active-link">
                        <button class="btn btn-primary active-lonk dropdown-toggle" type="button"
                            id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
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
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
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
        <h1 class="txts1">¿Buscas la mejor pieza de decoración para tus espacios?</h1>
    </div>
    <div class="txt2">
        <h1 class="txts2">¡Has llegado al lugar indicado!</h1>
    </div>
    <div class="txt3">
        <h1 class="txts3">Nuestro portafolio cuenta con piezas unicas y diseñadas a tu gusto, que van con tu
            personalidad y hacen
            tus espacios mas agradables.</h1>
        <h1 class="txts3">Esta línea nos trae gran variedad de productos como lo son porta esferos, porta celulares,
            colgadores de
            llaves, retablos, recordatorios, decoraciones para festas, imanes, joyeros, cajas y muchas cosas más...</h1>
    </div>
    <!---Carrusel--->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $chunks = $products->chunk(4); // Divide la colección en grupos de 4 elementos
            @endphp
            @foreach ($chunks as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $product)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <div class="stars">
                                            @php
                                                // Genera un número aleatorio entre 4 y 5 para las estrellas amarillas
                                                $randomStars = rand(4, 5);
                                            @endphp
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $randomStars)
                                                    <i class="bi bi-star-fill active"></i>
                                                @else
                                                    <i class="bi bi-star-fill"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <div class="mt-auto">
                                            <p class="card-text">${{ $product->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
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
    @include('partials.footerTuArte')

</body>

</html>

<style>
    /*estilos Breadcrums*/

    .breadcrums {
        display: flex;
    }

.breadcrums a {
    text-decoration: none;
    color: white;
    font-size: 0.8vw;
    margin-right: 2px; /* Esto agrega un espacio entre los enlaces */
}

    .breadcrumbs li {
        display: inline;
        padding: 0;
    }

    .breadcrumbs a:hover {
        color: red;
    }
</style>
