

<div style="width: 100%; display: flex; ">
      <div class="log-in">
      <a href="{{ url('documentos/ManualUsuario.pdf') }}" class="circle-btn" target="_blank">?</a>
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

</style>