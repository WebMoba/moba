

<div style="width: 100%; display: flex; ">

      <div class="log-in">
      
     
    <a href="{{ asset('/') }}" class="letter" > Principal / </a> 
        @if (Route::has('login'))
        @auth
                    <a href="{{ url('/dashboard') }}" class="letter"> &nbsp;Inicio /   </a>
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form" >
                        @csrf
                        <a href="{{ route('logout') }}" class="letter" 
                            onclick="event.preventDefault(); clearCartAndLogout();">
                            &nbsp;<i class="bi bi-person-circle"></i> Cerrar Sesión
                        </a>
                    </form>

                    @else
                        <a href="{{ route('login') }}" class="letter">&nbsp;Ingresar /  </a>
                        

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="letter">&nbsp; Registrarse</a>


                        @endif
                    @endauth
        @endif
    </div>
</div>

<script>
    function clearCartAndLogout() {
        // Limpiar el carrito
        localStorage.removeItem('cart');
        
        // Enviar el formulario de cierre de sesión
        document.getElementById('logout-form').submit();
    }
</script>

<style>


a.letter{
    text-decoration: none;
    color: white    ;
    font-size: 0.9vw;
    font-family: sans-serif !important;

}

.log-in{
    display: flex;
}

        .mapa{
        color: white;
        margin-right: 1%;
        font-size: 0.8rem;
        text-decoration: none;
    }

</style>