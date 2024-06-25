<div class="container-fluid mt-5">
  <div class="card bg-white mx-5" style="width: 100%;" >
        <div class="row mb-4">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="footer-text pull-left">
                    <div class="d-flex">
                        
                        <h1 style="color: #957bda"><img src="{{ asset('Imagenes/LogoTuArte.png') }}" class="navbar-img-right" alt="Logo Tu Arte"></h1>
                    </div><br>
                    <p class="card-text">Diseño y Comunicacion</p>
                    <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-md-2 col-sm-2 col-xs-2">
            <h5 class="heading">Tu Arte</h5>
                <ul class="card-text">
                    <li class="enlaceFooter"><a href="{{ route('tuArteMenu.servicios.Accesorios.index') }}" >Servicios</a></li>
                    <li class="enlaceFooter"><a href="{{ route('tuArteMenu.index') }}" >Nosotros</a></li>
                    <li class="enlaceFooter"><a href="{{ route('tuArteMenu.categorias.index') }}">Categorias</a></li>
                    <li class="enlaceFooter"><a href="{{ route('tuArteMenu.galeria.index') }}">Galeria</a></li>
                    <li class="enlaceFooter"><a href="{{ route('tuArteMenu.Contacto.index') }}" >Contáctanos</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <h5 class="heading">Moba</h5>
                <ul class="card-text">
                    <li class="enlaceFooter"><a href="{{ route('mobaMenu.index')}}" >Nosotros</a></li>
                    <li class="enlaceFooter"><a href="{{ route('mobaMenu.proyectos.index') }}">Proyectos</a></li>
                    <li class="enlaceFooter"><a href="{{ route('mobaMenu.EquipoTrabajo.index') }}">Equipo de trabajo</a></li>
                    <li class="enlaceFooter"><a href="{{ route('mobaMenu.Contacto.index') }}">Contáctanos</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
                <h5 class="heading">Contacto</h5>
                <ul class="card-text">
                    <li><i class="bi bi-house-door"> Cl. 15a #7A - 30, Sogamoso, Boyacá</i> </li>
                    <li><i class="bi bi-telephone"> + 57 3133466060</i></li>
                    <li><i class="bi bi-envelope-at">  agenciamoba@gmail.com</i></li>
                    <li><i class="bi bi-browser-chrome"> teamMoba.com.co</i></li>
                   <span><a href="{{ url('documentos/mapaNavegacion.pdf')}}" download="MapaNavegacion.pdf" class="mapa"> <i class="bi bi-crosshair"></i> Mapa de Navegacion</a><br></span> 
                    <span> <a href="{{ url('documentos/ManualUsuario.pdf') }}" target="_blank" class="mapa" ><i class="bi bi-person-badge"></i> Manual de Usuario </a></span>
                  
                </ul>
            </div>
        </div>
        <div class="divider mb-4" style="color: #C5CAE9 !important;"> </div>
        <div class="row" style="font-size:10px;">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-left">
                    <p><i class="fa fa-copyright"></i> 2024 copyright</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="foot"> <p> 2024 &copy; Todos los derechos reservados.
                    creado por Grupo 2 SENA 2615133 </p>
                   <p>Las imágenes utilizadas en este sitio son propiedad de la empresa Moba.</p></div>
            </div>
            </div>
        </div>
    </div>
</div>

<style>
    .foot p {
    margin: 0; /* Elimina el margen */
    padding: 0; /* Elimina el relleno (padding) */
}
ul>li i:hover {
    color: #C5CAE9 !important;
    cursor: none;
}

.mapa{
    color: #C5CAE9 !important;
    margin-bottom: 10px;
}
.mapa:hover{
    color: #C5CAE9 !important;
}



</style>