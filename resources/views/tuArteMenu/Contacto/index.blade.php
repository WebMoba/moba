<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/StyleContactoTuArte/ContactoTuArte.css') }}">
          <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="background-image">

    <nav class="navbar" style="display: inline-block;">
        <div class="container-fluid">
        <a href="{{ route('mobaMenu.index')}}">
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

    <div class="breadcrums">
        @include('helpers.breadcrumbs', ['breadcrumbs' => [
        ['url' => route('tuArteMenu.index'), 'label' => 'Tu Arte /Nosotros'],
        ['url' => route('tuArteMenu.Contacto.index'), 'label' => 'Contacto'],]])
    </div>

        @include('partials.inicio')

      
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

        

        <div class="box">
    <form method="POST" action="{{ route('enviar-correo') }}">
    @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ auth()->check() ? auth()->user()->name : '' }}" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" required><br><br>
		
        <ul class="option-list">
        <li class="option-item">
            <input type="radio" id="option1" name="options" class="option-input" required>
            <label for="option1" class="option-label">Cedula</label>
        </li>
        <li class="option-item">
            <input type="radio" id="option2" name="options" class="option-input" required>
            <label for="option2" class="option-label">Cedula de extranjeria</label>
        </li>
        <li class="option-item">
            <input type="radio" id="option3" name="options" class="option-input" required>
            <label for="option3" class="option-label">NIT</label>
        </li>
    </ul><br>


        <label for="numeroId">Numero Identificación</label>
        <input type="text" id="NumeroId" name="NumeroId" maxlength="10" required><br><br>
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" maxlength="10" required><br><br>
        <label for="departamento">Departamento</label>
		<input type="text" id="Departamento" name="Departamento" required><br><br>
        <label for="ciudad">Ciudad</label>
		<input type="text" id="Ciudad" name="Ciudad" required><br><br>
		<label for="mensaje">Mensaje</label><br>
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
    color:red;
}

.active-link:after {
    color:#2bb9e5;
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px; /* Grosor de la línea */
    background-color: red; /* Color de la línea */
}
.box{
    height: 70%;
    width: 45%;
    margin-top:5%;
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



.option-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: inline-flex;
    }

    /* Estilo para cada opción */
    .option-item {
        margin-bottom: 10px;
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


    .breadcrums a {
    text-decoration: none;
    color: white;
    font-size: 0.6vw;
    display: inline;
    margin-right: 10px; /* Esto agrega un espacio entre los enlaces */
   
}


</style>