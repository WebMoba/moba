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
         <!--- inicio breaddrums-->
    <div class="breadcrums">
        @include('helpers.breadcrumbs', ['breadcrumbs' => [
        ['url' => route('welcome'), 'label' => 'Bienvenido /'],
        ['url' => route('mobaMenu.index'), 'label' => 'Moba /'],
        ['url' => route('mobaMenu.Servicios.servicios'), 'label' => 'Servicios'],]])
        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>
<!--- final breaddrums-->

        <div class="container-fluid">
        <a href="{{ route('mobaMenu.index')}}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{ route('mobaMenu.Servicios.servicios') }}" class="active-link">
                        <button class="btn btn-primary active-lonk dropdown-toggle" type="button"
                            id="dropdownMenuButton"aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" onclick="mostrarCuadroPorNumero(1)">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" onclick="mostrarCuadroPorNumero(2)">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" onclick="mostrarCuadroPorNumero(3)">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index') }}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Moba">
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

        <div class="contenido">
            <div class="contenido1">
                <div class="titulo">
                    <h1>Servicios</h1>
                </div>
                <div class="subtitulo">
                    <h3>
                        ¿Buscas llevar la comunicación de tu empresa al siguiente nivel?
                    </h3>
                    <h4>
                        ¡Has llegado al lugar indicado!
                    </h4>
                </div>
                <div class="texto">
                        <p>
                            Como expertos en diseño y comunicación, somos el proveedor ideal para ayudarte a crear
                            piezas de
                            comunicación interna de alto rendimiento y brindarte la asesoría que necesitas para lograr
                            una comunicación
                            interna efectiva. ¡Contáctanos hoy y transforma la forma en que te comunicas con tus
                            clientes!
                        </p>
                </div>
            </div>

            <div class="contenido2">
                <div class="creatividad">
                    <p>
                    <h1 class="t1">Creatividad y dedicación</h1><br>
                    <h2 class="t2">son las cosas que nuestra</h2><br>
                    <h2 class="t3">agencia MOBA</h2> <br>
                    <h2 class="t4">aporta a tu negocio.</h2><br>
                    </p>
                </div>
                <div class="contenedor">
                    <div class="cuadro" id="cuadro1">
                        <div class="texto-cuadro">
                            <div class="titulos-cuadro">
                                <h1>IDENTIDAD</h1>
                                <h2>CORPORATIVA</h2>
                            </div>
                            <div class="contenido-cuadro">
                                <div class="mayme">
                                    <p>
                                        <
                                    </p>
                                    <p>
                                        >
                                    </p>
                                </div>
                                <p>
                                    Nuestra Agencia se enfoca en el sentido de cada marca que manejamos, lo que
                                    quieren y deben transmitir con su imagen corporativa, cada detalle cuenta
                                    y lo más importante estamos siempre en movimiento, aportando, creando, mejorando...
                                </p>
                            </div>
                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior()">
                                <h1>
                                    <
                                </h1>
                            </button>
                            <button onclick="mostrarCuadroSiguiente()">
                                <h1>
                                    >
                                </h1>
                            </button>
                        </div>
                    </div>

                    <div class="cuadro" id="cuadro2" style="display: none;">
                        <div class="texto-cuadro">
                            <div class="titulos-cuadro">
                                <h1>AVISOS</h1>
                                <h2>y PUBLICIDAD</h2>
                                <h2>para interiores</h2>
                            </div>
                            <div class="contenido-cuadro">
                                <div class="mayme">
                                    <p>
                                        <
                                    </p>
                                    <p>
                                        >
                                    </p>
                                </div>
                                <p>
                                    La primera impresión que las marcas que manejamos dejan en sus clientes debe
                                    ser siempre positiva, debe transmitir el ser de cada empresa y generar en el
                                    espectador seguridad y seriedad de la marca, por tanto cada detalle que plasmamos...
                                </p>
                            </div>

                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior()">
                                <h1>
                                    <
                                </h1>
                            </button>
                            <button onclick="mostrarCuadroSiguiente()">
                                <h1>></h1>
                            </button>
                        </div>
                    </div>

                    <div class="cuadro" id="cuadro3" style="display: none;">
                        <div class="texto-cuadro">
                            <div class="titulos-cuadro">
                                <h1>POP</h1>
                                <h2>y algo más</h2>
                            </div>
                            <div class="contenido-cuadro">
                                <div class="mayme">
                                    <p>
                                        <
                                    </p>
                                    <p>
                                        >    
                                    </p>
                                </div>
                                <div class="textoC">
                                    <p>
                                        Nuestra empresa cuenta con servicios y productos adicionales que complementan
                                        y suman a cada uno de nuestros clientes, los cuales están elaborados con la
                                        mayor calidad
                                        y detalle posible, entregando en cada trabajo nuestro mejor
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="botones">
                            <button onclick="mostrarCuadroAnterior()">
                                <h1>
                                    <
                                </h1>
                            </button>
                            <button onclick="mostrarCuadroSiguiente()">
                                <h1>
                                    >
                                </h1>
                            </button>
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

        function mostrarCuadroPorNumero(numero) {
            // Oculta todos los cuadros
            document.getElementById('cuadro1').style.display = 'none';
            document.getElementById('cuadro2').style.display = 'none';
            document.getElementById('cuadro3').style.display = 'none';

            // Muestra el cuadro correspondiente al número
            document.getElementById(`cuadro${numero}`).style.display = 'block';

            // Actualiza el índice cuadroActual
            indiceCuadroActual = numero;
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

        .active-link {
            position: relative;
            color: #2bb9e5;
        }

        .active-link:after {
            color: #2bb9e5;
            content: '';
            position: absolute;
            left: 0;
            bottom: -9px;
            width: 100%;
            height: 2px;
            /* Grosor de la línea */
            background-color: blue;
            /* Color de la línea */
        }

        .active-lonk {
            color: #2bb9e5;
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
            text-align: center;
        }

        .subtitulo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            padding: 1%;
            text-align: center;
        }

        .subtitulo h4 {
            font-weight: bold;
            padding: 1%;
        }

        .texto:not(:last-child)::after {
            content: '';
            /* Contenido generado */
            position: absolute;
            /* Posicionamiento absoluto */
            top: 1px;
            /* Arriba */
            left: -28px;
            /* Alineado a la izquierda del texto */
            width: 5px;
            /* Ancho del HR vertical */
            height: 160%;
            /* Altura del HR vertical */
            background-color: cornflowerblue;
            /* Color del HR vertical */
        }

        .texto {
            color: #BCCCE0;
            font-size: 24px;
            /* Tamaño de la fuente */
            position: relative;
            /* Establece la posición relativa para que sea la referencia para el HR */
            font-weight: normal;
        }

        a {
            text-decoration: none
        }

        .contenido2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 100%;
            padding-top: 5%;
            overflow-x: hidden; /* Evitar desplazamiento horizontal */
        }

        .creatividad {
            display: flex;
            justify-content: center;
            flex-direction: column;
            height: 100%;
            width: 40%;
            color: white;
            padding-bottom: 10%;
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

        .creatividad .t1 {
            font-size: 35px;
            font-weight: bold
        }

        .creatividad .t2 {
            font-size: 30px;
        }

        .creatividad .t3 {
            font-size: 30px;
            color: #2bb9e5;
            font-weight: bold;
        }

        .creatividad .t4 {
            font-size: 30px;
            font-weight: bold;
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
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100% ;
            height: 100% ;
            margin-right: 20px; /* Espacio entre cuadros */
        }

        .cuadro:first-child {
            display: block;
            /* El primero visible por defecto */
        }

        .texto-cuadro {
            border: 2px solid grey;
            padding: 20px;
            overflow-y: auto;
            width: 500px; 
            height: 400px; 
        }

        .titulos-cuadro {
            width: 100%;
        }

        .contenido-cuadro {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            padding-top: 5%;
            width: 100%;
        }

        .contenido-cuadro .mayme {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 40%;
            flex-direction: column;
            padding-left: 10%;
            padding-right: 15%;
        }

        .contenido-cuadro .mayme p {
            font-size: 50px;
        }

        .contenido-cuadro .textoC {
            width: 60%;
            height: 100%;
        }

        .cuadro .botones {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding-bottom: 3%;
        }

        .cuadro .botones button {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
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
        .container-fluid{
            padding: 0 !important;
        }

        @media screen and (max-width: 1200px) {
            .texto-cuadro{
                width: 400px; 
                height: 300px; 
            }
        }

        @media screen and (max-width: 1000px) {
            .texto-cuadro{
                width: 350px; 
                height: 300px; 
            }
        }

        @media screen and (max-width: 900px) {
            .texto-cuadro{
                width: 300px; 
                height: 250px; 
                padding-bottom:20%; 
            }
            .creatividad{
                width: 200px; 
            }
            .creatividad .t1 {
                font-size: 25px;
                font-weight: bold
            }
    
            .creatividad .t2 {
                font-size: 20px;
            }
    
            .creatividad .t3 {
                font-size: 20px;
                color: #2bb9e5;
                font-weight: bold;
            }
    
            .creatividad .t4 {
                font-size: 20px;
                font-weight: bold;
            }
            .texto {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 700px) {
            .texto-cuadro{
                width: 250px; 
                height: 200px; 
                padding-bottom:20%; 
            }
            .creatividad{
                width: 150px; 
            }
            .creatividad .t1 {
                font-size: 20px;
                font-weight: bold
            }
    
            .creativida15.t2 {
                font-size: 15px;
            }
    
            .creatividad .t3 {
                font-size: 15px;
                color: #2bb9e5;
                font-weight: bold;
            }
    
            .creatividad .t4 {
                font-size: 15px;
                font-weight: bold;
            }
            .titulos-cuadro h1,h2{
                font-size: 20px;
                font-weight: bold;
            }
            .contenido-cuadro p {
                font-size: 10px;
            }
            .texto {
                font-size: 14px;
            }
        }
        
        @media screen and (max-width: 580px) {
            .contenido2{
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .texto-cuadro{
                width: 250px; 
                height: 200px; 
                padding-bottom:20%; 
            }
            .creatividad{
                width: 150px; 
            }
            .creatividad .t1 {
                font-size: 20px;
                font-weight: bold
            }
    
            .creativida15.t2 {
                font-size: 15px;
            }
    
            .creatividad .t3 {
                font-size: 15px;
                color: #2bb9e5;
                font-weight: bold;
            }
    
            .creatividad .t4 {
                font-size: 15px;
                font-weight: bold;
            }
            .titulos-cuadro h1,h2{
                font-size: 20px;
                font-weight: bold;
            }
            .contenido-cuadro p {
                font-size: 10px;
            }
            .texto {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 400px) {
            .contenido2{
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .contenido2 .creatividad{

            }
            .contenido2 .contenedor{
                padding-right: 10%;
            }
        }
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

.breadcrumbs a:hover{
    color:  #2bb9e5;
}


    </style>

@include('partials.footerMoba')

</body>

</html>