<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipo de trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/StyleFooter.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- menu  -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ asset('/') }}">
                <img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" class="navbar-img-left" alt="Logo Moba">
            </a>
            <div class="navbar-buttons">
                <div class="dropdown">
                    <a href="{{ route('mobaMenu.Servicios.servicios') }}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </button>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Identidad
                                Corporativa</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">Avisos y
                                Publicidad para interiores</a></li>
                        <li><a class="dropdown-item" href="{{ route('mobaMenu.Servicios.servicios') }}">POP y álgo
                                más</a></li>
                    </ul>
                </div>
                <a href="{{ route('mobaMenu.index') }}" class="btn btn-primary ">Nosotros</a>
                <a href="{{ route('mobaMenu.proyectos.index') }}" class="btn btn-primary">Proyectos</a>
                <a href="{{ route('mobaMenu.EquipoTrabajo.index') }}" class="btn btn-primary active-link">Equipo de
                    trabajo</a>
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

    <div class="vertical-line right-line">
        <hr class="linea2">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <div class="vertical-line right-line">
        <hr class="linea3">
        <a href="https://www.instagram.com/moba_agencia"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/MOBAcomunicacionGrafica/"><i class="bi bi-facebook"></i></a>
        <hr class="linea2">
    </div>

    <aside>
        <aside id="miAsideJavier" style="display: none;" class="aside-container">
            <button id="cerrarAsideJavier" class="cerrarAside">X</button>
            <p class="p1">
                Sus años en la universidad de la vida y su carrera profesional lo forjaron y mentalizaron para crear y
                fundar a MOBA, esto lo llevo a entender que antes de llevar el timón hay que aprender a remar en equipo.
                Ese esfuerzo y pasión por lo que cree y hace, le permiten vivir al máximo cada reto que se propone al
                emprender una idea para sacarla a flote. Sin duda tiene el don de la palabra para llegar a las personas,
                toca en sus corazones las fibras de la alegría y siempre logra sacar una sonrisa en el prójimo.

            </p>
            <p class="p1">
                Le encanta la música, su tercer idioma son las groserías, ama el anime en especial One Piece. Para él la
                familia es su piedra angular en la vida, sus mascotas le dan sentido a sus días, y está enamorado de su
                segunda familia “MOBA”. De cualquier forma, su interés está en mejorar la calidad de vida de las
                personas,
                tratar de hacer feliz a sus familiares, amigos y al mundo en general.
            </p>
        </aside>

        <aside id="miAsideSofia" style="display: none;" class="aside-container">
            <button id="cerrarAsideSofia" class="cerrarAside">X</button>
            <p class="p1">
                "Nunca permitas que nadie borre esa sonrisa de tu rostro"
                es lo que ella piensa cada vez que emprende algo en su vida y es la frase que usa como mantra para
                mantener
                la frente en alto en cada paso.
            </p>
            <p class="p1">

                Emocionada por lograr éxito para sus empresas, Sofía pone un sello de alegria y singularidad a cada una
                de
                sus actividades.
                Ella gasta toda su energía en entregar lo mejor para MOBA y TU ARTE, y dia a dia la recarga con una
                caricia
                a sus mascotas y
                con el compartir diario en sus entrenamientos deportivos, además de un delicioso café que se hace más
                delicioso por estar en compañía de su familia y amigos.
                Ama el arte y la música aunque lleva años intentando aprender a tocar guitarra. Y asi se la pasa
                poniendo
                color a cada Minuto de los 10.080 minutos de cada semana.
            </p>
        </aside>

        <aside id="miAsideDayana" style="display: none;" class="aside-container">
            <button id="cerrarAsideDayana" class="cerrarAside">X</button>
            <p class="p1">
                Su paso por Moba nos demuestra que a veces las segundas partes sí son buenas, y es que Dayana ya trabajó
                con
                nosotros más de 4 años y se fue a aventurarse por otros lados.

                Allí se dió cuenta que las pintas están bien, pero como una cervecita frente al mar no hay nada y tras
                unos
                meses regresó.

            </p>
            <p class="p1">
                Y así volvió a formar parte de nuestra familia.
            </p>
            <p class="p1">
                Apasionada por la pintura y la creatividad, a veces introvertida pero cuando tiene confianza puede
                explotar
                en alegría,
                amante de las cosas minimalistas y esto lo demuestra en cada cosa que hace por eso en su mente siempre
                tiene
                la frase " menos es más".
                Apasionada por lo que hace y un poco malhumorada cunado las cosas no sle como las espera.
                Es amante de las cosas pequeñas,
                un paseo por la montaña con su hiperactiva perra, salidas con los amigos, visitas a su familia.
            </p>
        </aside>

        <aside id="miAsideLinda" style="display: none;" class="aside-container">
            <button id="cerrarAsideLinda" class="cerrarAside">X</button>
            <p class="p1">
                Hay personas que en la mirada y en su sonrisa cargan toneladas de ternura y alegría, y si,
                ella parece ser una de esas personas. Hace parte del equipo ya hace muuuchos días, y día tras
                día le da ese toque único a cada trabajo o actividad en la que participa.

            </p>
            <p class="p1">

                Su disposición para aprender nos hace ser mejores, nos exige mas calidad y compromiso y su Juventud
                nos recuerda las ganas de estar vivos y lograr las metas que nos proponemos.
                Ella tiene alma de Gato y su amor por el deporte la hace un ser completo, lleno de energía y de color
                que
                comparte con quienes mas quiere, de vez en cuando gruñona, la mayoría de veces alegre, y esto le da
                equilibrio a su vida,
                haciéndola un ser único para complementar nuestro equipo.
            </p>
        </aside>
    </aside>
    <!---------------------------------------------------------------------------------------------------------------->
    <div class="main-contentainer">

        <div class="container mt-5 mb-5 ">

            <div class="container ms-5">
                <div class="equipo" style="position: relative; display: inline-block;">
                    <img src="{{ asset('Imagenes/imgs-gallery/EquipoDeTrabajo_1.jpg') }}" alt="Equipo"
                        id="equipo" class="img-equipo img-fluid">
                    <div class="text-container position-absolute bottom-0 start-50 translate-middle-x">
                        <a class="text-1  p-1 mb-5 border-opacity-30 rounded-2 fondo-equipo" id="equipo">EQUIPO MOBA</a>
                    </div>
                </div>
            </div>



            <div class="box-1">
                <div class="texto">

                    <h1 class="text mt-5"> EQUIPO DE TRABAJO </h1>

                    <p class="p mt-3">
                        Este es el espacio donde seguramente una agencia diría que, en efecto, es una agencia. </p>
                    <p class="p">
                        Nosotros nos consideramos una familia, porque estamos hechos de personas, con todo tipo de
                        talentos.

                        En esta familia hay artistas, músicos, emprendedores, deportistas, en fin. Y es gracias a esa
                        calidad
                        humana y todo ese talento reunido que también hacemos publicidad, porque así ayudamos a nuestras
                        marcas a
                        tener un rol significativo en la vida de las personas. Así que si quieres hacer parte de nuestra
                        familia, eres
                        bienvenido.
                    </p>
                </div>



            </div>


        </div>
        
        <div class="imagenes col-md-7">

            <div class="contenido col-md-3">

                <a> Y sí... </a> <br>
                <a> Estos somos</a><br>
                <a class="text-1"> nosotros</a>
            </div>

            
            <a target="_blank" class="imagen-contenedor javier-imagen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier" >
                <img src="{{ asset('Imagenes/imgs-gallery/javier1.jpg') }}" alt="JAVIER" id="JAVIER" name="Javier" class="img-thumbnail img-fluid" title="Javier">
                <span class="tooltip">Javier</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Canela">
                <img src="{{ asset('Imagenes\imgs-gallery\Canela.jpg') }}" alt="Canela" name="Canela" class="img-thumbnail img-fluid">
                <span class="tooltip">Canela</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Haku">
                <img src="{{ asset('Imagenes\imgs-gallery\Haku_.jpg') }}" alt="Haku" name="Haku" class="img-thumbnail img-fluid">
                <span class="tooltip">Haku</span>
            </a>

            <a target="_blank" class="imagen-contenedor sofia-imagen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\SOFIA_PEREZ12.jpg') }}" alt="SOFIA_PEREZ1" name="Sofia"id="SOFIA_PEREZ1" class="img-thumbnail img-fluid">
                <span class="tooltip">Sofia</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\Gamin_.jpg') }}" alt="Gamin" name="Gamin" class="img-thumbnail img-fluid">
                <span class="tooltip">Gamin</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\Mischa_.jpg') }}" alt="Mischa" name="Mischa" class="img-thumbnail img-fluid">
                <span class="tooltip">Mischa</span>
            </a>

            <a target="_blank" class="imagen-contenedor dayana-imagen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\DAYANA_FONSECA1.jpg') }}" alt="DAYANA_FONSECA1" name="Dayana" id="DAYANA_FONSECA1" class="img-thumbnail img-fluid">
                <span class="tooltip">Dayana</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\Billu.jpg') }}" alt="Billu" name="Billu" class="img-thumbnail img-fluid">
                <span class="tooltip">Billu</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\Samy.jpg') }}" alt="Samy" name="Samy" class="img-thumbnail img-fluid">
                <span class="tooltip">Samy</span>
            </a>

            <a target="_blank" class="imagen-contenedor linda-imagen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\LINDA_PEREZ_1l.JPG') }}" alt="LINDA_PEREZ" name="Linda" id="LINDA_PEREZ" class="img-thumbnail img-fluid">
                <span class="tooltip">Linda</span>
            </a>

            <a target="_blank" class="imagen-contenedor" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Javier">
                <img src="{{ asset('Imagenes\imgs-gallery\Tokio.jpg') }}" alt="Tokio" name="Tokio"class="img-thumbnail img-fluid">
                <span class="tooltip">Tokio</span>
            </a>
        </div>

    </div>



    </div>

    <footer>
        @include('partials.footerMoba')
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        
        
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener la referencia a las imágenes y los asides correspondientes
            const imagenJavier = document.getElementById('JAVIER');
            const asideJavier = document.getElementById('miAsideJavier');
            const botonCerrarJavier = document.getElementById('cerrarAsideJavier');

            const imagenSofia = document.getElementById('SOFIA_PEREZ1');
            const asideSofia = document.getElementById('miAsideSofia');
            const botonCerrarSofia = document.getElementById('cerrarAsideSofia');

            const imagenDayana = document.getElementById('DAYANA_FONSECA1');
            const asideDayana = document.getElementById('miAsideDayana');
            const botonCerrarDayana = document.getElementById('cerrarAsideDayana');

            const imagenLinda = document.getElementById('LINDA_PEREZ');
            const asideLinda = document.getElementById('miAsideLinda');
            const botonCerrarLinda = document.getElementById('cerrarAsideLinda');

            // Agregar eventos de clic a las imágenes
            imagenJavier.addEventListener('click', function() {
                asideJavier.style.display = asideJavier.style.display === 'none' ? 'block' : 'none';
            });

            imagenSofia.addEventListener('click', function() {
                asideSofia.style.display = asideSofia.style.display === 'none' ? 'block' : 'none';
            });

            imagenDayana.addEventListener('click', function() {
                asideDayana.style.display = asideDayana.style.display === 'none' ? 'block' : 'none';
            });

            imagenLinda.addEventListener('click', function() {
                asideLinda.style.display = asideLinda.style.display === 'none' ? 'block' : 'none';
            });

            // Agregar eventos de clic a los botones de cierre
            botonCerrarJavier.addEventListener('click', function() {
                asideJavier.style.display = 'none';
            });

            botonCerrarSofia.addEventListener('click', function() {
                asideSofia.style.display = 'none';
            });

            botonCerrarDayana.addEventListener('click', function() {
                asideDayana.style.display = 'none';
            });

            botonCerrarLinda.addEventListener('click', function() {
                asideLinda.style.display = 'none';
            });


            // Agregar eventos de clic a los botones de cierre
            botonCerrarJavier.addEventListener('click', function() {
                asideJavier.style.display = 'none';
            });

            botonCerrarSofia.addEventListener('click', function() {
                asideSofia.style.display = 'none';
            });

            botonCerrarDayana.addEventListener('click', function() {
                asideDayana.style.display = 'none';
            });

            botonCerrarLinda.addEventListener('click', function() {
                asideLinda.style.display = 'none';
            });
        });
    </script>



</body>

</html>

<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 10%;
    }

    .main-container {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .main-contentainer {
        flex-grow: 1;
    }

    .fondo-equipo {
        background-color: #BCCCE0;
    }

    footer {
        margin-top: 510px;
        /*Aquí bajamos el footer para dar la posición despues de la ultima imagen */
        width: 100%;
    }

    .img-container {
        position: relative;
    }

    .text-container {

        padding: 5px 10px;
        border: 1px solid #ffffff;
        /* Ajusta el estilo del borde según lo desees */
        border-radius: 5px;
    }

    .aside-container {
        right: 0;
        /* Alinear desde la derecha */
        top: 10%;
        height: 100vh;
        /* Ocupar todo el alto de la pantalla */
        width: 50%;
        /* Ocupar la mitad del ancho de la pantalla */
        background-color: black;
        border-radius: 10px;
        font-size: 100%;
        position: fixed;
        /* Fijar la posición en la pantalla */
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 999;
        /* Asegurar que esté por encima del resto del contenido */
    }

    .cerrarAside {
        background-color: #151414;
        /* Color neutro */
        color: #fbf9f9;
        /* Color de texto */
        border: 2px solid #2bb9e5;
        /* Borde */
        border-radius: 5px;
        /* Bordes redondeados */
        padding: 5px 10px;
        /* Espaciado interno */
        cursor: pointer;
        /* Cambia el cursor al pasar por encima */
    }

    .cerrarAside:hover {
        background-color: #fabdbd;
        /* Cambia el color al pasar el ratón */
    }

    .p1 {

        border-left: 10px solid #2bb9e5;
        padding-left: 20px;
        margin-right: 8%;
        margin-left: 8%;
        margin-top: 10%;
        margin-bottom: 10%;


        text-align: justify;
        line-height: 2;
        margin-bottom: 0;

    }

    .aside-container.active {
        opacity: 2;
        /* Hacer visible */
        transform: translateX(0);
        /* Desplazar a la posición original */
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




    .btn-primary {
        background-color: transparent !important;
        color: #fff;
        border-color: transparent !important;
        font-size: 1.3vw;
    }

    .btn-primary:hover {
        background-color: transparent !important;
        border-color: transparent !important;
    }

    .btn-primary:active,
    .btn-primary:focus {
        background-color: transparent !important;
        border-color: transparent !important;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: transparent !important;
        border-color: transparent !important;
        border: none;
        text-shadow: 0 0 5px #f80008;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: rgba(161, 174, 250, 0.274) !important;
        /* Cambia el color de fondo al pasar el cursor sobre las opciones del menú */
    }

    .dropdown-item:hover {
        color: #2bb9e5 !important;
    }

    .dropdown-menu {
        background-color: transparent !important;
        border-color: #73a3b6 !important;
    }

    .dropdown-menu .dropdown-item {
        color: #2bb9e5 !important;
        background-color: transparent !important;
        border-color: #2bb9e5 !important;
    }

    .dropdown-menu .dropdown-divider {
        border-top: 1px solid #2bb9e5;
    }

    .box-1,
    .box-2 {

        height: 100%;
        width: 100% display inline-block;


    }

    .box-1 {
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin-top: 2%;

    }

    .texto {

        height: 90%;
        width: 90%;
        text-align: center;
        color: #BCCCE0;
        margin-top: 0%;
        font-size: 110%;
        margin-left: 10%;
        margin-right: 5%;
        padding: 2%;
        font-weight: 600;
    }

    .text {
        color: #2bb9e5;
        font-size: 280%;
        font-weight: bold;
        line-height: 1.5;
        margin-bottom: 2;
    }

    .p {
        border-left: 5px solid #2bb9e5;
        padding-left: 10px;
        text-align: justify;
        line-height: 1.5;
        margin-bottom: 0;
    }

    .box-2 {

        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;

    }

    .text-1 {
        color: #2bb9e5;
        font-size: 140%;
        font-weight: bold;
        line-height: 1.5;
        margin-bottom: 2;
        font-weight: 1000;
    }

    .contenido,
    .imagenes {
        align-items: center;
        position: relative;
        font-size: 180%
    }

    .imagenes {
        height: 800px;
        width: 100%;
        /* Ancho del contenedor */
        margin-left: 1%;
        margin-right: 1%;
        padding-top: 1%;
        border-radius: 10px;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        justify-content: center
    }

    .imagenes a {
        max-width: 30.33%;
        /* Cada elemento ocupa un tercio del ancho disponible */
        box-sizing: border-box;
        /* Incluye el padding y el borde en el cálculo del ancho */
        padding: 1%;
        /* Espacio entre las imágenes */
        margin: 1%
    }


    .imagenes img {
        background-color: #ccc;
        border: solid 1px #0b0b0b;
        width: 300px;
        height: 250px;
        object-fit: cover;
        object-position: right;
        border-radius: 10px;
        padding-top: 0.5%;
        padding-bottom: 0.5%;
        margin: 0.5% 0.5%;
        /* Centra horizontalmente con margen automático */
        transition: transform 0.3s ease;
    }

    .img-thumbnail:hover {
        transform: scale(1.1);
    }

    .imagen-contenedor {
        position: relative;
        display: inline-block;
        margin-bottom: 20px; /* Ajusta la separación entre las imágenes */
    }
    
    .tooltip {
        /* Estilos del tooltip estos estilos 
        son para llamar el Nombre del integrante del Equipo*/
        position: absolute;
        bottom: -30px; /* Ajusta la posición vertical del nombre */
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(244, 243, 243, 0.7);
        color: #000000;
        font-weight: bold; /* Agrega negrita */
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 25px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .imagen-contenedor:hover .tooltip {
        opacity: 1;
    }
    

    .container-fluid {
        padding: 0 !important;
    }

    
    .imagen-contenedor::after {
        content: attr(alt);
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .imagen-contenedor:hover::after {
        opacity: 1;
    }

    .javier-imagen:hover,
    .sofia-imagen:hover,
    .dayana-imagen:hover,
    .linda-imagen:hover {

        cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="white" stroke="black" stroke-width="2"/><path d="M12 6v12m-6-6h12" fill="none" stroke="black" stroke-width="2"/></svg>'), auto;
    }
</style>
