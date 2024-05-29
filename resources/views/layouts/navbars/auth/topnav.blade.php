<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-white" href="{{ route('dashboard') }}">Menu Principal</a>
                </li>
                @if (Request::is('quotes/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('quotes.index') }}">Cotizaciones</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Cotización</li>
                @elseif (Request::is('quotes/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('quotes.index') }}">Cotizaciones</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Cotización</li>
                @elseif (Request::is('person/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('person.index') }}">Personas</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Persona</li>
                @elseif (Request::is('person/show/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('person.index') }}">Personas</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Persona</li>
                @elseif (Request::is('person/edit/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('person.index') }}">Personas</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Persona</li>
                @elseif (Request::is('events/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('events.index') }}">Eventos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Evento</li>
                @elseif (Request::is('events/*/edit'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('events.index') }}">Eventos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Evento</li>
                @elseif (Request::is('events/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('events.index') }}">Eventos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Evento</li>
                @elseif (Request::is('purchasesD/purchases/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('purchases.index') }}">Compras</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Compra</li>
                @elseif (Request::is('purchasesD/purchases/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('purchases.index') }}">Compras</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Compra</li>
                @elseif (Request::is('materials_raws/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('materials_raws.index') }}">Materia Prima</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Materia Prima</li>
                @elseif (Request::is('materials_raws/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('materials_raws.index') }}">Materia Prima</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Materia Prima</li>
                @elseif (Request::is('materials_raws/*/edit'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('materials_raws.index') }}">Materia Prima</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Materia Prima</li>
                @elseif (Request::is('sales/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('sales.index') }}">Ventas</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Venta</li>
                @elseif (Request::is('sales/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('sales.index') }}">Ventas</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostar Venta</li>
                @elseif (Request::is('product/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('product.index') }}">Productos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Producto</li>
                @elseif (Request::is('product/*/edit'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('product.index') }}">Productos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Producto</li>
                @elseif (Request::is('product/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('product.index') }}">Productos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Producto</li>
                @elseif (Request::is('categories-products-service/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white"
                            href="{{ route('categories-products-service.index') }}">Categorias</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Categoria</li>
                @elseif (Request::is('categories-products-service/show/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white"
                            href="{{ route('categories-products-service.index') }}">Categorias</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Categoria</li>
                @elseif (Request::is('categories-products-service/edit/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white"
                            href="{{ route('categories-products-service.index') }}">Categorias</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Categoria</li>
                @elseif (Request::is('service/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('service.index') }}">Servicios</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Servicio</li>
                @elseif (Request::is('service/edit/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('service.index') }}">Servicios</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Servicio</li>
                @elseif (Request::is('service/show/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('service.index') }}">Servicios</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostar Servicio</li>
                @elseif (Request::is('projects/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('projects.index') }}">Proyectos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Proyecto</li>
                @elseif (Request::is('projects/*/edit'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('projects.index') }}">Proyectos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Proyecto</li>
                @elseif (Request::is('projects/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('projects.index') }}">Proyectos</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Proyecto</li>
                @elseif (Request::is('team-works/create'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('team-works.index') }}">Equipos de Trabajo</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Agregar Equipo de
                        Trabajo</li>
                @elseif (Request::is('team-works/*/edit'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('team-works.index') }}">Equipos de Trabajo</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Editar Equipo de
                        Trabajo</li>
                @elseif (Request::is('team-works/*'))
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-white" href="{{ route('team-works.index') }}">Equipos de Trabajo</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mostrar Equipo de
                        Trabajo</li>
                @else
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}
                    </li>
                @endif
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>


        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">

           
          

                <li class="nav-item d-flex align-items-center">
                    
                <a href="{{ url('documentos/ManualAdministrativo.pdf') }}" class="circle-btn" target="_blank">?</a> 

                    <a href="{{ asset('/') }}" style="margin: 10px 10px;  text-decoration: underline;"
                        class="nav-link text-white font-weight-bold px-0">Principal</a>
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0"
                            style="margin: 10px 10px;  text-decoration: underline;">
                            <i class="bi bi-person-circle"></i>
                            <span class="d-sm-inline d-none">Cerrar Sesión</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<style>
     .circle-btn {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1.5px solid;
            background-color: transparent;
            color: white;
            text-align: center;
            line-height: 18px;
            font-size: 15px;
            margin-right: 15px;
            transition: background-color 0.3s;
        }
        .circle-btn:hover{
            color: cornflowerblue;
        }
</style>