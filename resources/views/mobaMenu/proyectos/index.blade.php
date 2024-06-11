<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylesproyect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="background-image">
    <div
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/Fondo_moba2.jpg') }}'); background-size: 100% 100%; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: -1; filter: brightness(10%); -webkit-filter: brightness(30%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('mobaMenu.index'), 'label' => 'Moba /'],
                    ['url' => route('mobaMenu.proyectos.index'), 'label' => 'Proyectos'],
                ],
            ])
        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>
        <!--- final breaddrums-->

        <div class="container-fluid">
            <a href="{{ route('mobaMenu.index') }}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba"></a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{ route('mobaMenu.Servicios.servicios') }}"><button
                            class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button></a>
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
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary active-link">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte"></a>
        </div>


    </nav>
    <div class="content">
        <div class="vertical-line left-line">
            <hr class="linea1">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea1">
        </div>
        //inicio de proyectos
        //proyectos cuadro
        <div class="title-container">
            <h1 class="big-title">PROYECTOS</h1>
        </div>


        <div class="txt3">
            <h1 class="txts3">La imagen corporativa de nuestros clientes es tan importante para ellos como para
                nosotros, con la calidad
                de trabajo de nuestra agencia podemos garantizar cada una de las piezas de comunicación que creamos,
                y para demostrarte que somos los mejores en lo que hacemos, te invitamos a revisar algunos de los
                trabajos que hemos desarrollado para empresas y marcas que confían en nosotros.</h1>
        </div>

        <div class="vertical-line right-line">
            <hr class="linea2">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea2">
        </div>
    </div>


    </pindiv>
    </div>
    <!-- prueba de carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 0 && $index <= 2)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 3 && $index <= 5)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 6 && $index <= 8)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <!-- Primera fila del carrusel 2 -->
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 9 && $index <= 11)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Segunda fila del carrusel 2 -->
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 12 && $index <= 14)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Tercera fila del carrusel 2 -->
                    <div class="row">
                        @foreach ($projects as $index => $project)
                            @if ($index >= 15 && $index <= 17)
                                <div class="col-md-4">
                                    <div class="image-container">
                                        <a href="{{ route('mobaMenu.proyectos.Muestra', $project->id) }}">
                                            <img src="{{ asset('storage/' . $project->logo) }}">
                                            <div class="overlay">
                                                <div class="text">{{ $project->name }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
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




    <!-- navbar -->
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

    <!--identidad y demas-->
    <script>
        let indiceCuadroActual = 1;

        function mostrarCuadroAnterior() {
            // Oculta el cuadro actual
            document.getElementById(cuadro$ {
                indiceCuadroActual
            }).style.display = 'none';

            // Actualiza el índice al cuadro anterior
            indiceCuadroActual = (indiceCuadroActual - 1) > 0 ? (indiceCuadroActual - 1) : 3;

            // Muestra el cuadro anterior
            document.getElementById(cuadro$ {
                indiceCuadroActual
            }).style.display = 'block';
        }

        function mostrarCuadroSiguiente() {
            // Oculta el cuadro actual
            document.getElementById(cuadro$ {
                indiceCuadroActual
            }).style.display = 'none';

            // Actualiza el índice al cuadro siguiente
            indiceCuadroActual = (indiceCuadroActual + 1) > 3 ? 1 : (indiceCuadroActual + 1);

            // Muestra el cuadro siguiente
            document.getElementById(cuadro$ {
                indiceCuadroActual
            }).style.display = 'block';
        }
    </script>

    <style>
        .contenido {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 90%;
            margin-top: 10%;
            margin-left: 5%;
        }

        .txt3 {
            width: 60%;
        }

        .active-link {
            position: relative;
            color: #2bb9e5;
        }

        .active-link:after {
            color: #2bb9e5;
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            /* Grosor de la línea */
            background-color: blue;
            /* Color de la línea */
        }

        .contenido1 {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70%;
            flex-direction: column;
        }

        .titulo {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2bb9e5;

        }

        .subtitulo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            padding: 1%;
        }

        .subtitulo h4 {
            font-weight: bold;
            padding: 1%;
        }

        .lineatexto {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }

        .linea {}

        .texto {

            color: white;
        }

        .contenido2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 100%;
            padding-top: 5%;
        }

        .creatividad {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100%;
            width: 40%;
            color: white;
        }

        .creatividad p {
            text-align: left;
        }

        .creatividad h1,
        h2 {
            text-align: justify;
        }

        .creatividad a {
            text-align: justify;
        }

        .contenedor {
            height: 100%;
            width: 40%;
            margin-left: 10%;
        }

        .contenedor h1 {
            color: #2bb9e5;
            font-weight: bold;
        }

        .contenedor h2 {
            color: white;
        }

        .contenedor p {
            color: #6094b0;
        }

        .cuadro {
            background-color: transparent;
            display: none;
            /* Por defecto, todos ocultos */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .cuadro:first-child {
            display: block;
            /* El primero visible por defecto */
        }

        .texto-cuadro {
            border: 2px solid grey;
            padding: 20px;
        }

        .cuadro .botones {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cuadro .botones h1 {
            color: white;
        }

        .texto h2 {
            margin-top: 0;
            /* Elimina el margen superior del título */
        }

        .botones {
            margin-top: 20px;
        }

        .botones button {
            margin-right: 10px;
            border: 1px solid grey;
            background-color: transparent;
            padding: 10px 20px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            color: #2bb9e5 !important;
        }

        .dropdown-menu {
            background-color: #3E3E3F !important;
            border-color: #73a3b6 !important;
        }

        .dropdown-menu .dropdown-item {
            color: #2bb9e5 !important;
            background-color: #3E3E3F !important;
            border-color: #2bb9e5 !important;
        }

        .dropdown-menu .dropdown-divider {
            border-top: 1px solid #2bb9e5;
        }

        .btn-primary {
            background-color: #3E3E3F !important;
            color: #fff;
            border-color: #3E3E3F !important;
            font-size: 1.3vw;
        }

        .btn-primary:hover {
            background-color: #3E3E3F !important;
            border-color: #3E3E3F !important;
        }

        .btn-primary:active,
        .btn-primary:focus {
            background-color: #3E3E3F !important;
            border-color: #3E3E3F !important;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #3E3E3F !important;
            border-color: #3E3E3F !important;
            border: none;
            text-shadow: 0 0 5px #2bb9e5;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: rgba(161, 174, 250, 0.274) !important;
            /* Cambia el color de fondo al pasar el cursor sobre las opciones del menú */
        }

        .dropdown-item:hover {
            color: #2bb9e5 !important;
        }

        .dropdown-menu {
            background-color: #3E3E3F !important;
            border-color: #73a3b6 !important;
        }

        .dropdown-menu .dropdown-item {
            color: #2bb9e5 !important;
            background-color: #3E3E3F !important;
            border-color: #2bb9e5 !important;
        }

        .dropdown-menu .dropdown-divider {
            border-top: 1px solid #2bb9e5;
        }



        /estilos Breadcrums/ .breadcrums {
            display: flex;
        }

        .breadcrums a {
            text-decoration: none;
            color: white;
            font-size: 0.9vw;
            margin-right: 2px;
            /* Esto agrega un espacio entre los enlaces */
        }

        .breadcrumbs li {
            display: inline;
            padding: 0;
        }

        .breadcrumbs a:hover {
            color: #2bb9e5;
        }
    </style>

    @include('partials.footerMoba')

</body>

</html>
