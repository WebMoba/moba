<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Imagenes/Logotipo Moba-06.png') }}">
<title>
    Moba
</title> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar">
        <!--- inicio breaddrums-->
    <div class="breadcrums">
        @include('helpers.breadcrumbs', ['breadcrumbs' => [
        ['url' => route('welcome'), 'label' => 'Bienvenido /'],
        ['url' => route('mobaMenu.index'), 'label' => 'Moba /'],
        ['url' => route('mobaMenu.Contacto.index'), 'label' => 'Contactanos'],]])
        </div>
        <div class="inicioRegistro"> @include('partials.inicio')</div>
<!--- final breaddrums-->

        <div class="container-fluid">
        <a href="{{ route('mobaMenu.index')}}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{route('mobaMenu.Servicios.servicios')}}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Identidad Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">Avisos y Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{route('mobaMenu.Servicios.servicios')}}">POP y álgo más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index')}}" class="btn btn-primary">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary">Equipo de trabajo</a>
                <a href="{{ route('mobaMenu.Contacto.index') }}" class="btn btn-primary active-link">Contáctanos</a>
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

<div class="container">

 <!-- Contenido contacto  -->

    <div class="box">
    <div class="boxText">
    <h1>Contacto</h1><br><br>
    <h3>¡Somos el estudio de diseño y comunicación que buscabas!</h3>
    <h3>Las soluciones en comunicación que ofrecemos a nuestros 
    clientes son completamente personalizadas y adaptadas a 
    cada necesidad.</h3>
    <h3> Haz clic al botón azul para coordinar una reunión estratégica con LA AGENCIA</h3><br>
    <h3> Contacto: (051) 933 375 953</h3>
    </div>   
    </div>

 <!-- Contenido formulario de contacto -->

 <div class="box">
    <form method="POST" action="{{ route('enviar-correo') }}">
    @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ auth()->check() ? auth()->user()->name : '' }}" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" required><br><br>
		
        <ul class="option-listOne">Tipo Identificación
        <li class="option-item">
            <input type="radio" id="option2" name="options" class="option-input" required>
            <label for="option2" class="option-label">Cedula Extranjeria</label>
        </li>
        <li class="option-item">
            <input type="radio" id="option1" name="options" class="option-input" required>
            <label for="option1" class="option-label">Cedula</label>
        </li>
       
        <li class="option-item">
            <input type="radio" id="option3" name="options" class="option-input" required>
            <label for="option3" class="option-label">NIT</label>
        </li>
    </ul><br>


        <label for="NumeroId">Numero Identificación:</label>
        <input type="text" id="NumeroId" name="NumeroId" maxlength="10" required><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" maxlength="10" required><br><br>
        <label for="telefono">Departamento</label>
		<input type="text" id="Departamento" name="Departamento" required><br><br>
        <label for="telefono">Ciudad</label>
		<input type="text" id="Ciudad" name="Ciudad" required><br><br>


		<label for="mensaje">Mensaje:</label><br>
		<textarea id="mensaje" name="mensaje" rows="5" ></textarea><br><br>

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


@include('partials.footerMoba')
    
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
.active-link {
    position: relative;
    color:#2bb9e5;
}

.active-link:after {
    color:#2bb9e5;
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px; /* Grosor de la línea */
    background-color: blue; /* Color de la línea */
}
.box{
    height: 70%;
    width: 45%;
    margin-top:5%;
    margin-left: 10%;
    overflow: auto;
    
}
.boxText{
    width: 95%;
    height: 95%;
    margin-top: 2%;
}

h1{
    color: white;
} 

h3{
    color: #BCCCE0;
}
label{
    color:  #BCCCE0 ;
    
}
form{
    margin-top: 10%;
    margin-left: 20%;
 

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
#submit{
    background-color: #BCCCE0;
    width: 25%;
    color: black;
    
}
.container-fluid{
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
        font-size: 0.9vw;
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
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Estilo para cuando se pasa el mouse sobre la etiqueta */
    .option-label:hover {
        background-color: #f0f0f0;
    }
    .option-input:checked + .option-label {
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
    margin-right: 2px; /* Esto agrega un espacio entre los enlaces */
}

.breadcrumbs li {
    display: inline;
    padding: 0;
}

.breadcrumbs a:hover{
    color:  #2bb9e5;
}

form{
    margin: 0px !important;
    
}

</style>