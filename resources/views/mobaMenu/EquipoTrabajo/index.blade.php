<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
        <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/Logomoba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{route('mobaMenu.Servicios.servicios')}}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index')}}" class="btn btn-primary">Nosotros</a>
                <a href="#" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
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

<div class="container">

 <!-- Contenido ¿QUIÉNES SOMOS?  -->

    <div class="box"><h1>¿QUIÉNES SOMOS?</h1><br><br>
    <h3></h3>
    <h3>Moba Comunicación Gráfica Agencia De Diseño Y Publicidad surge como una
        propuesta novedosa, apostándole a la creatividad y a la imaginación, para satisfacer las necesidades de las marcas y sus clientes.
        Hoy en día, somos un referente de diseño, comunicación y publicidad; contamos con talento humano capaz de crear, desarrollare implementar 
        campañas eficaces en medios impresos, web, radiales y televisivos. Cada proceso que realizamos en nuestra compañía está fundamentado en el
        valor agregado que le entregamos a nuestros clientes a través de la honestidad, la disciplina y la “buena onda”
    </h3>
    <section class="mapa">
        <h3 class="titulo-principal">Nuestra Ubicación </h3>
        <p>Nuestro establecimiento esta ubicado en el corazón de la ciudad</p>

        <div class="mapa-contenido">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.4982461547978!2d-72.93899077156787!3d5.714146134081456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a45d10a0669a7%3A0x5bd7c178ff586f57!2sCra.%2019%20%235115%2C%20Sogamoso%2C%20Boyac%C3%A1!5e0!3m2!1ses!2sco!4v1707448666257!5m2!1ses!2sco" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section class="diferenciales">

        <h3 class="titulo-principal">EQUIPO DE TRABAJO</h3>
        
        <div class="contenido-diferenciales">
                
            <ul class="lista-diferenciales">        
                <li class="items"><Label>Lider</Label></li>
                <li class="items">Espacio diferenciado</li>
                <li class="items">Localización </li>
                <li class="items">Profesionales calificados</li>
                <li class="items">Puntualidad</li>
                <li class="items">Limpieza</li>
            </ul><img src="diferenciales/diferenciales.jpg" class="imagen-diferenciales">
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
</body>

</html>

<style>
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    width: 100%;
    
}
.box{
    height: 70%;
    width: 50%;
    margin-top:5%;
}
h1, h3{
    color: #BCCCE0;
}
label{
    color:  #BCCCE0 ;
}
form{
    margin-top: 10%;
    margin-left: 10%;
}
input{
    width: 90%;
    margin-right: 10%;
    background-color: #3E3E3F;
    color: white;
}
textarea{
    width: 90%;
    background-color: #3E3E3F;
    color: white;
}
.mapa{
    padding: 3em 0;
    background: linear-gradient(#fefefe, #888888);
}

.mapa p{ 
    margin: 0 0 2em;
    text-align: center;
}

.mapa-contenido{
    width: 940px;
    margin: 0 auto;
}


.diferenciales{
    padding: 3em 0;
    background: #888888;
}


.contenido-diferenciales{
    width: 640px;
    margin: 0 auto;

}

.lista-diferenciales{
    width: 40%;
    display: inline-block;
    vertical-align: top;
}

#submit{
    background-color: #BCCCE0;
    width: 25%;
    color: black;
    
}
</style>