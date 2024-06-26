<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header" >
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('welcome')}}" id="navbarBrand">
            <div class="brand-container d-flex justify-content-between align-items-center">
                <img src="{{ asset('/Imagenes/Logotipo_moba.png') }}" class="navbar-brand-img h-180" alt="main_logo"
                    width="90px" height="80px">
                <img src="{{ asset('/Imagenes/LogoTuArte.png') }}" class="navbar-brand-img h-100" alt="main_logo"
                    width="43px" height="47x">
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                    href="{{ route('page', ['page' => 'dashboard']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menú</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Registros</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'person') == true ? 'active' : '' }}"
                    href="{{ route('person.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-plus text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Personas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'event') == true ? 'active' : '' }}"
                    href="{{ route('events.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-calendar-event text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Eventos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'purchase') == true ? 'active' : '' }}"
                    href="{{ route('purchases.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Compras</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'materials_raw') == true ? 'active' : '' }}"
                    href="{{ route('materials_raws.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-tree-fill text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Materia prima</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'sale') == true ? 'active' : '' }}"
                    href="{{ route('sales.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart3 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ventas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}"
                    href="{{ route('product.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-basket"></i>
                    </div>
                    <span class="nav-link-text ms-1">Productos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories-products-service.index') ? 'active' : '' }}"
                    href="{{ route('categories-products-service.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-diagram-3-fill text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Categorías</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('service.index') ? 'active' : '' }}"
                    href="{{ route('service.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-clipboard-check text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Servicios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'projects') == true ? 'active' : '' }}"
                    href="{{ route('projects.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-calendar2-plus text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Proyectos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'team-work') == true ? 'active' : '' }}"
                    href="{{ route('team-works.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill text-info text-back opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Equipo de trabajo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'quote') == true ? 'active' : '' }}"
                    href="{{ route('quotes.index') }}">
                    <div
                        class="icon icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-bell text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Cotizaciones</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var navbarBrand = document.getElementById('navbarBrand');
    var navbarNav = document.querySelector('.navbar-nav');
    var sidenav = document.getElementById('sidenav-main');

    function toggleNavbarNav() {
      if (navbarNav.style.display === "none" || navbarNav.style.display === "") {
        navbarNav.style.display = "block";
        sidenav.classList.add('sidenav-background-black');
        sidenav.classList.remove('sidenav-background-transparent');
      } else {
        navbarNav.style.display = "none";
        sidenav.classList.add('sidenav-background-transparent');
        sidenav.classList.remove('sidenav-background-black');
      }
    }

    function handleResize() {
      if (window.innerWidth > 990) {
        navbarNav.style.display = "block";
        sidenav.classList.remove('sidenav-background-black', 'sidenav-background-transparent');
      } else {
        navbarNav.style.display = "none";
        sidenav.classList.add('sidenav-background-transparent');
        sidenav.classList.remove('sidenav-background-black');
      }
    }

    navbarBrand.addEventListener('click', function(event) {
      event.preventDefault();
      if (window.innerWidth <= 990) {
        toggleNavbarNav();
      }
    });

    window.addEventListener('resize', handleResize);

    // Call handleResize on initial load
    handleResize();
  });
</script>