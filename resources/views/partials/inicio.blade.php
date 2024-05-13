

<div style="width: 100%; display: flex; ">
      <div class="log-in">
    <a href="{{ asset('/') }}" class="letter" >Volver / </a> 
        @if (Route::has('login'))
        @auth
                    <a href="{{ url('/dashboard') }}" class="letter">Inicio /  </a>
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}" class="letter"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="letter">Ingresar /  </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="letter">Registrarse</a>
                        @endif
                    @endauth
        @endif
    </div>
</div>

<style>


a.letter{
    text-decoration: none;
    color: white    ;
    font-size: 0.9vw;
    margin-bottom: 5%;
    
}

.log-in{
    display: flex;
}

</style>