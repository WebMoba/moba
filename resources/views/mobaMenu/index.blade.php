<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="{{asset('css/mobaS.css')}}">
</head>
<body class="background-image">
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('Imagenes/Fondo_TuArte5.jpg') }}'); background-size: 100% 100%; background-position: center top; background-repeat: no-repeat; opacity: 1; z-index: -1; filter: brightness(10%); -webkit-filter: brightness(30%);">
    </div>
    <nav class="navbar">
        <!--- inicio breaddrums-->
        <div class="breadcrums">
            @include('helpers.breadcrumbs', ['breadcrumbs' => [
            ['url' => route('welcome'), 'label' => 'Bienvenido /'],
            ['url' => route('mobaMenu.index'), 'label' => 'Moba /'],
            ['url' => route('mobaMenu.index'), 'label' => 'Nosotros'],]])
        </div>
        <div class="inicioRegistro">@include('partials.inicio')</div>
        <!--- final breaddrums-->
        <div class="container-fluid">
            <a href="{{ route('mobaMenu.index')}}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{route('mobaMenu.Servicios.servicios')}}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index')}}" class="btn btn-primary active-link">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary">Contáctanos</a>
            </div>
            <a href="{{ route('tuArteMenu.index') }}">
                <img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte">
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

        <div class="logotexto">
            <div class="textonda">
                <div class="texto">
                    <p>MOBA surge como una propuesta novedosa apostándole a la creatividad y a la imaginación, 
                        para satisfacer las necesidades de las marcas y los clientes.</p>
                    <br>
                    <p>Con 8 años de experiencia, somos un referente en diseño, comunicación y publicidad; 
                        contamos con talento humano capaz de crear estructuras, desarrollar e implementar campañas 
                        eficaces en medios impresos y digitales.</p>
                    <br>
                    <p>Los pilares y bases de nuestro trabajo, estan regidos por la honestidad, la disiplina y la...</p>
                </div>
                <!-- buena onda-->
                <div class="onda">
                    <h1>"Buena Onda"</h1>
                </div>
            </div>
            <div class="logomoba">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </div>
        </div>
    
        <div class="vertical-line right-line">
            <hr class="linea2">
            <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
            <hr class="linea2">
        </div>
    </div>
    
    <div class="container-slider">
        <div class="slider-background">  
            <div class="slider">
                <div class="slide-track">
                    @foreach($projects as $project)
                        <img src="{{ asset('storage/' . $project->logo) }}" alt="Logo de {{ $project->name }}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.querySelector('.dropdown').addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });

        document.querySelector('.dropdown').addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    </script>

@include('partials.footerMoba')
</body>
</html>

