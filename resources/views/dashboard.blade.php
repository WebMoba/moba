<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Ingreso Exitoso!') }}
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
<!-- Aca va el inicio de las tablas -->

<!-- Contenido -->
<div class="logo">
   
    <!-- Insersion de imagenes  -->
    <a href="{{ route('mobaMenu.index') }}" class="logos">
        <div class="logos"><img src="{{ asset('Imagenes/Logotipo_Moba.png') }}" alt="Imagen"></div>
    </a>

    <a href="{{ route('tuArteMenu.index') }}" class="logos">
        <div class="logos"><img src="{{ asset('Imagenes/imgPrincipalView/LogotipoTuArte.png') }}" alt="Imagen"
                id="img2"></div>
    </a>


    
</div>
</div>
<!-- Contenido -->




<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        /* 100% del viewport height */
        
    }

    .container {

        height: 100%;
        /* Ajuste la altura del contenedor al 100% */

    }

    .nav {

        height: 5vh;
        text-align: right;
        padding: 20px 10px 1px 1px;


    }

    .letter {
        font-size: 14.4px Nunito, sans-serif;
        color: white;
        text-decoration: none;
        margin-right: 10px;
    }

    .letter:hover {
        color: grey;
    }

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 60vh;
        width: 100%;
        margin-top: 8%;

    }

    .logos {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45%;
        height: 95%;

    }

    /* Ajustar el ancho y alto de la imagen Moba */
    .logos img {
        width: 120%;
        height: 65%;
        transition: width 0.7s, height 0.7s;
        cursor: pointer;
    }

    .logos img:hover {
        width: 140%;
        height: 85%
    }

    /* Ajustar el ancho y alto de la imagen tu arte */
    #img2 {
        width: 90%;
        height: 85%
    }

    #img2:hover {
        width: 110%;
        height: 105%
    }

    .links {
        display: flex;
        flex-direction: column;
        /* Establecer el diseño en columna */
        align-items: center;
        /* Centrar verticalmente los elementos */
        justify-content: center;
        width: 5%;
        height: 80%;
    }

    .logoRedes img {
        width: 20px;
        height: 20px;
        margin-bottom: 10px;
    }

    .linea {
        border: none;
        border-left: 1px solid #F21630;
        /* Estilo de la línea vertical */
        height: 50%;
        /* Altura de la línea */
        margin: 10px 0;
        /* Espacio entre la línea y los elementos */
    }

    .linea.grey {
        border-left: 1px solid #BCCCE0;
    }




    @keyframes spin-horizontal {
    0%, 50% {
        transform: rotateY(0deg);
    }
    50% {
        transform: rotateY(90deg);
    }
}

.logos img {
    animation: spin-horizontal 10s linear infinite;
}
</style>
