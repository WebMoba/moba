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
                        <li><a class="dropdown-item" href="#">Accesorios</a></li>
                        <li><a class="dropdown-item" href="#">Decoracion</a></li>
                        <li><a class="dropdown-item" href="#">Joditas pa'l Recuerdo</a></li>
                        <li><a class="dropdown-item" href="#">Mascotas</a></li>
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

    <!-- Contenido de la página aquí -->

    <div class="container">
    <div class="contenedor">
    @foreach ($categorias as $categoria)
        <div class="campo campo1">
            <h1><a href="#" onclick="redirigir('{{ $categoria->name }}')">{{ $categoria->name }}</a></h1>
        </div>
    @endforeach
</div>

<script>
    function redirigir(nombreCategoria) {
        switch (nombreCategoria) {
            case 'Mascotas':
                window.location.href = "{{ route('tuArteMenu.servicios.Mascotas.index') }}";
                break;
            case 'Accesorios':
                window.location.href = "{{ route('tuArteMenu.servicios.Accesorios.index') }}";
                break;
            case 'Decoracion':
                window.location.href = "{{ route('tuArteMenu.servicios.Decoracion.index') }}";
                break;
            case 'Joditas pal recuerdo':
                window.location.href = "{{ route('tuArteMenu.servicios.JoditasPa´lRecuerdo.index') }}";
                break;
            default:
                break;
        }
    }
</script>
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
        document.querySelector('.dropdown').addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });

        document.querySelector('.dropdown').addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
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

    .container {
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        width: 90%;
        height: 100vh;
    }

    .contenedor {
     display: flex;
    height: 80%;
    /* 100% de la altura de la ventana */
    width: 90%;
    margin-top: 8%;
}

    .campo {
        border: 20px solid white;
        color: white;
}

.campo1 {
    flex-grow: 1; /* Hacer que el campo se expanda automáticamente */
    height: 100%;
    /* 100% de altura */
    position: relative;
}

    .campo1:hover {
        background-color: red;
        cursor: pointer;
        color: white;
    }

   
    .campo1 h1 {
        position: absolute;
        bottom: 0;
        margin-left: 5%;
        color: white;
        margin-bottom: 20%;

    }

    
</style>
