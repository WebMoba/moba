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
            <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba">
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{route('mobaMenu.servicios.index')}}"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </button></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('mobaMenu.servicios.identidad')}}">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" href="#">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="#">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="#" class="btn btn-primary">Proyectos</a>
                <a href="#" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
        </div>
    </nav>
    <div class="content">
        <div class="vertical-line left-line">
            <hr class="linea1">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea1">
        </div>
    
        <div class="contenido">
            <div class="contenido1">
                <div class="titulo">
                    <h1>Servicios</h1>
                </div>
                <div class="subtitulo">
                    <h4>
                        ¿Buscas llevar la comunicación de tu empresa al siguiente nivel?
                    </h4>
                    <h5>
                        ¡Has llegado al lugar indicado!
                    </h5>
                </div>
                <div class="lineatexto">
                    <div class="linea">
                        linea
                    </div>
                    <div class="texto">
                        <p>
                            Como expertos en diseño y comunicación, somos el proveedor ideal para ayudarte a crear piezas de 
                            comunicación interna de alto rendimiento y brindarte la asesoría que necesitas para lograr una comunicación 
                            interna efectiva. ¡Contáctanos hoy y transforma la forma en que te comunicas con tus clientes!
                        </p>
                    </div>
                </div>
            </div>

            <div class="contenido2">
                <div class="creatividad">
                    <h1>creatividad....</h1>
                </div>
                <div class="contenedor">
                    <div class="cuadro" id="cuadro1">
                        <div class="texto">
                            <h2>Cuadro 1</h2>
                            <p>Este es el contenido del primer cuadro.</p>
                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior(3)">Mostrar anterior cuadro</button>
                            <button onclick="mostrarCuadroSiguiente(2)">Mostrar siguiente cuadro</button>
                        </div>
                    </div>

                    <div class="cuadro" id="cuadro2" style="display: none;">
                        <div class="texto">
                            <h2>Cuadro 2</h2>
                            <p>Este es el contenido del segundo cuadro.</p>
                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior(1)">Mostrar anterior cuadro</button>
                            <button onclick="mostrarCuadroSiguiente(3)">Mostrar siguiente cuadro</button>
                        </div>
                    </div>

                    <div class="cuadro" id="cuadro3" style="display: none;">
                        <div class="texto">
                            <h2>Cuadro 3</h2>
                            <p>Este es el contenido del tercer cuadro.</p>
                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior(2)">Mostrar anterior cuadro</button>
                            <button onclick="mostrarCuadroSiguiente(1)">Mostrar siguiente cuadro</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="vertical-line right-line">
            <hr class="linea2">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea2">
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
        function mostrarCuadroAnterior(numeroCuadro) {
            // Obtener el cuadro actual
            var cuadroActual = document.querySelector('.cuadro[style="display: block;"]');
            
            // Oculta el cuadro actual
            cuadroActual.style.display = 'none';
            
            // Muestra el cuadro anterior
            document.getElementById(`cuadro${numeroCuadro}`).style.display = 'block';
        }

        function mostrarCuadroSiguiente(numeroCuadro) {
            // Obtener el cuadro actual
            var cuadroActual = document.querySelector('.cuadro[style="display: block;"]');
            
            // Oculta el cuadro actual
            cuadroActual.style.display = 'none';
            
            // Muestra el cuadro siguiente
            document.getElementById(`cuadro${numeroCuadro}`).style.display = 'block';
        }


        // Función para mostrar el siguiente cuadro
        // function mostrarSiguienteCuadro(numeroCuadro) {
        //     document.getElementById(`cuadro${numeroCuadro - 1}`).style.display = 'none';
        //     document.getElementById(`cuadro${numeroCuadro}`).style.display = 'block';
        // }

        // // Función para volver al cuadro inicial
        // function mostrarCuadroInicial() {
        //     document.getElementById('cuadro3').style.display = 'none';
        //     document.getElementById('cuadro1').style.display = 'block';
        // }
        // function mostrarSegundoCuadro() {
        //     const segundoCuadro = document.querySelector('.cuadro:nth-child(2)');
        //     segundoCuadro.classList.add('visible');
        // }

        // function mostrarTercerCuadro() {
        //     const tercerCuadro = document.querySelector('.cuadro:nth-child(3)');
        //     tercerCuadro.classList.add('visible');
        // }

        // function mostrarPrimerCuadro() {
        //     const primerCuadro = document.querySelector('.cuadro:nth-child(1)');
        //     primerCuadro.classList.add('visible');
        // }
    </script>

    <style>
        .contenido{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 90%;
            margin-top: 10%;
            margin-left: 5%;
        }
        .contenido1{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70%;
            flex-direction: column;
        }
        .titulo{
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            
        }
        .subtitulo{
            display: flex;
            align-items: center;
            justify-content: center;    
            flex-direction: column;
            color: white;
        }
        .lineatexto{
            display: flex;
            align-items: center;
            justify-content: center;    
            flex-direction: row;
        }
        .linea{

        }
        .texto{
            
            color: white;
        }

        .contenido2{
            display: flex;
            align-items: center;
            justify-content: center;    
            flex-direction: row;
            width: 100%;
        }
        .creatividad{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40%;
            color: white;
        }

        .contenedor {
            margin-top: 50px; /* Ajusta según tu diseño */
        }

        .cuadro {
            border: 2px solid grey;
            padding: 20px;
            background-color: transparent;
            display: none; /* Por defecto, todos ocultos */
        }

        .cuadro:first-child {
            display: block; /* El primero visible por defecto */
        }

        .texto h2 {
            margin-top: 0; /* Elimina el margen superior del título */
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

</body>
</html>