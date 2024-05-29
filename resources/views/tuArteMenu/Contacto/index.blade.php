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
    <link rel="stylesheet" href="{{ asset('css/StyleContactoTuArte/ContactoTuArte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="background-image">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <nav class="navbar">

        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', [
                'breadcrumbs' => [
                    ['url' => route('welcome'), 'label' => 'Bienvenido /'],
                    ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /'],
                    ['url' => route('tuArteMenu.Contacto.index'), 'label' => 'Contactanos'],
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
                <a href="{{ route('tuArteMenu.Contacto.index') }}" class="btn btn-primary active-link">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
            </a>
        </div>

        <!--- inicio breaddrums-->

    </nav>


    <!-- Líneas verticales con iconos -->
    <div class="vertical-line left-line">
        <hr class="linea1">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea1">
    </div>

    <div class="container">

        <!-- Contenido contacto  -->

        <div class="box">
            <h1>Contacto</h1><br><br>
            <h3>¡Somos el estudio de diseño y comunicación que buscabas!</h3>
            <h3>Nuestro deseo más grande es que te hallas enamorado de
                cada pieza tanto como nosotros, si deseas una pieza personalizada, o adquirir alguna de las piezas que
                se encuentran
                en nuestro portafolio, solo debes contactarnos, estaremos
                muy felices de hablar contigo.
            </h3><br>
            <h3> Contacto: +57 3106584795</h3>
        </div>

        <!-- Contenido formulario de contacto -->



        <div class="box form">
            <form method="POST" action="{{ route('enviar-correo') }}" id="contact-form">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"
                    value="{{ auth()->check() ? auth()->user()->name : '' }}" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"
                    value="{{ auth()->check() ? auth()->user()->email : '' }}" required><br><br>
                <ul class="option-listOne">Tipo Identificación
                    <li class="option-item">
                        <input type="radio" id="option1" name="options" value="Cedula Extranjeria" required
                            class="circle">
                        <label for="option2" class="option-label">Cedula Extranjeria</label>
                    </li>
                    <li class="option-item">
                        <input type="radio" id="option2" name="options" value="Cedula" required class="circle">
                        <label for="option1" class="option-label">Cedula</label>
                    </li>
                    <li class="option-item">
                        <input type="radio" id="option3" name="options" value="NIT" required class="circle">
                        <label for="option3" class="option-label">NIT</label>
                    </li>
                </ul><br>
                <label for="numeroId">Numero Identificación</label>
                <input type="text" id="numeroId" name="numeroId" maxlength="10" required><br><br>
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" maxlength="10" required><br><br>
                <label for="departamento">Departamento</label>
                <input type="text" id="departamento" name="departamento" required><br><br>
                <label for="ciudad">Ciudad</label>
                <input type="text" id="ciudad" name="ciudad" required><br><br>
                <label for="mensaje">Mensaje</label><br>
                <textarea id="mensaje" name="mensaje" rows="5" @if (isset($_GET['cartInfo'])) readonly @endif>@php
                    $cartInfo = isset($_GET['cartInfo']) ? urldecode($_GET['cartInfo']) : '';
                    echo $cartInfo;
                @endphp</textarea><br><br>
                <input type="submit" value="Enviar" id="submit">
            </form>
        </div>
    </div>

    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            });
        @endif

        // Obtén el formulario
        const form = document.getElementById('contact-form');

        // Añade el evento de envío
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario

            const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

            if (!isAuthenticated) {
                Swal.fire({
                    title: 'Para enviar un mensaje, primero debes iniciar sesión o registrarte.',
                    icon: 'info',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = "{{ route('login') }}";
                });
            } else {
                // Enviar el formulario usando Fetch API para asegurar que se envíe correctamente
                const formData = new FormData(form);
                fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Tu mensaje ha sido enviado.'
                        }).then(() => {
                            form.reset(); // Opcional: resetear el formulario después del envío
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al enviar tu mensaje.'
                        });
                    }
                })
                .catch(data => {
                        Swal.fire({
                            icon: 'success',
                                title: 'Éxito',
                                text: 'Tu mensaje ha sido enviado.'
                    });
                });
            }
        });
    });
</script>




    @include('partials.footerMoba')

</body>

</html>

<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70vw;
        width: 100%;
        margin-top: 5%;

    }

    .active-link {
        position: relative;
        color: red;
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
        background-color: red;
        /* Color de la línea */
    }

    .box {
        height: 70%;
        width: 45%;
        margin-top: 5%;
        margin-left: 5%;
        overflow: auto;

    }

    .boxText {
        width: 95%;
        height: 95%;
        margin-top: 2%;
    }

    h1 {
        color: white;
    }

    h3 {
        color: #BCCCE0;
        font-size: 1.8vw;
    }

    label {
        color: #BCCCE0;
        font-size: 2hw;
    }

    .box form {

        width: 45hw;
        height: 50hw;
    }


    form {
        margin-top: 10%;
        margin-left: 20%;


    }

    input {
        width: 90hw;
        height: 1.5vw;
        margin-right: 10%;
        background-color: #3E3E3F;
        color: white;
        font-size: 1vw;
    }

    textarea {
        width: 90%;
        background-color: #3E3E3F;
        color: white;
    }

    #submit {
        background-color: #BCCCE0;
        width: 25%;
        color: black;

    }

    .container-fluid {
        padding: 0 !important;
    }




    .option-listOne {
        list-style-type: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
        gap: 2px;
        display: flex;

    }

    /* Estilo para cada opción */
    .option-item {
        width: 7.3vw;
        font-size: 0.7vw;
        margin-bottom: 5px;
        text-align: center;

    }

    /* Estilo para el input oculto */
    .option-input {
        display: none;

    }


    /* Estilo para la etiqueta */
    .option-label {
        display: inline-block;
        padding: 8px 12px;
        cursor: pointer;
        width: 6vw;
        height: 2wv;
    }

    /* Estilo para cuando se pasa el mouse sobre la etiqueta */
    .option-label:hover {
        background-color: red;
    }

    .option-input:checked+.option-label {
        background-color: #007bff;
        color: white;
    }


    /*estilos Breadcrums*/

    .breadcrums {
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
        color: red;
    }

    form {
        margin: 0px !important;

    }

    input.circle {
        /* Aquí puedes definir los estilos */
        /* Por ejemplo: */
        width: 1vw;
        background-color: red;
        /* Y cualquier otro estilo que desees */
    }
</style>
