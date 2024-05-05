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
    <link rel="stylesheet" href="{{ asset('css/styleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="background-image">

    <nav class="navbar">
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba"></a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{ route('mobaMenu.Servicios.servicios') }}"><button
                            class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="">Identidad
                                Corporativa</a></li>
                        <li><a class="dropdown-item" href="#">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="#">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ asset('/') }}">
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
            <h1 class="big-title">CAFE MANA</h1>
        </div>

        <div class="container">
            <div class="row">
                <!-- Columna para el párrafo -->
                <div class="col-md-6">
                    <div class="titulo mt-4 mb-4">
                        <p>Somos una empresa dedicada a satisfacer las necesidades de nuestros clientes, principalmente
                            en frutas, verduras y demás productos de la canasta familiar; vinculando como aliados
                            estratégicos a proveedores; ofreciendo condiciones dignas de trabajo a personal idóneo que
                            vive y aplica principios de integridad, honestidad y constancia, garantizando la retribución
                            a los socios, conformando así un equipo comprometido con el desarrollo y bienestar de la
                            comunidad.</p>
                    </div>
                </div>
                <!-- Columna para el carrusel -->
                <!-- Columna para el carrusel -->
                <div class="col-md-6">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('Imagenes/imgproyectos/CAFEMANA.jpeg') }}" alt="PARAISO1"
                                    class="d-block w-100 carousel-img">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('Imagenes/imgproyectos/CAFEMANA2.jpeg') }}" alt="JAATELO"
                                    class="d-block w-100 carousel-img">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('Imagenes/imgproyectos/CAFEMANA3.jpeg') }}" alt="ACERIAS"
                                    class="d-block w-100 carousel-img">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
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
                document.getElementById(`cuadro${indiceCuadroActual}`).style.display = 'none';

                // Actualiza el índice al cuadro anterior
                indiceCuadroActual = (indiceCuadroActual - 1) > 0 ? (indiceCuadroActual - 1) : 3;

                // Muestra el cuadro anterior
                document.getElementById(`cuadro${indiceCuadroActual}`).style.display = 'block';
            }

            function mostrarCuadroSiguiente() {
                // Oculta el cuadro actual
                document.getElementById(`cuadro${indiceCuadroActual}`).style.display = 'none';

                // Actualiza el índice al cuadro siguiente
                indiceCuadroActual = (indiceCuadroActual + 1) > 3 ? 1 : (indiceCuadroActual + 1);

                // Muestra el cuadro siguiente
                document.getElementById(`cuadro${indiceCuadroActual}`).style.display = 'block';
            }
        </script>

        <style>
            /* css de prueba*/
                {
                font-family: Arial, sans-serif;
            }

            .container {
                padding-top: 50px;
                padding-bottom: 50px;
                position: relative;
                /* Establece el contenedor como posición relativa para que los elementos internos puedan ser posicionados relativamente a él */
            }

            .titulo {
                position: absolute;
                /* Establece la posición absoluta para que el título pueda posicionarse en la esquina superior izquierda del contenedor */
                top: 100px;
                /* Espacio desde la parte superior del contenedor */
                left: 20px;
                /* Espacio desde el lado izquierdo del contenedor */
                width: calc(50% - 40px);
                /* Calcula el ancho del título para ocupar la mitad del contenedor menos los márgenes */
                padding: 0 20px;
                /* Espacio interno del título */
            }
            .custom-title {
                position: relative;
                top: -10px; /* Ajusta este valor según sea necesario */
            }
            .galeria {
                width: calc(50% - 40px);
                /* Calcula el ancho de la galería para ocupar la mitad del contenedor menos los márgenes */
                float: right;
                /* Coloca la galería a la derecha del contenedor */
                padding: 0 20px;
                /* Espacio interno de la galería */
                overflow: hidden;
                /* Oculta cualquier desbordamiento horizontal */
            }

            .imagen {
                width: 100%;
                /* Ocupa el 100% del ancho de la galería */
                overflow-x: hidden;
                /* Oculta cualquier desbordamiento horizontal */
            }

            .imagen img {
                width: 100%;
                /* Ocupa el 100% del ancho de la imagen */
                height: auto;
                /* Altura automática para mantener la proporción */
            }

            .carousel-img {
                width: 100%;
                /* Ancho máximo del div del carrusel */
                height: auto;
                /* Para mantener la proporción de aspecto de la imagen */
                max-height: 400px;
                /* Altura máxima de las imágenes */
                min-height: 400px;
                /* Altura mínima de las imágenes */
                object-fit: cover;
                /* Para recortar y ajustar la imagen dentro del contenedor */
            }

            .botones {
                position: absolute;
                top: 10px;
                /* Ajusta la posición vertical de los botones */
                left: 180px;
                /* Ajusta la posición horizontal de los botones */
            }

            .boton {
                margin: 5px;
                /* Espacio entre los botones */
            }

            /* css de prueba*/
            .contenido {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                width: 90%;
                margin-top: 10%;
                margin-left: 5%;
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
        </style>
        <script>
            function anteriorImagen() {
                var galeria = document.querySelector('.galeria');
                galeria.scrollLeft -= galeria.offsetWidth;
            }

            function siguienteImagen() {
                var galeria = document.querySelector('.galeria');
                galeria.scrollLeft += galeria.offsetWidth;
            }
        </script>
        @include('partials.footerMoba')
</body>

</html>