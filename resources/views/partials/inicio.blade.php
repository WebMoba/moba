<div style="width: 0.5%"></div>
            @if (Route::has('login'))
                <div class="log-in">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="letter">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="letter">Ingresar </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="letter">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif


<style>
a.letter{
    font-size: 0.9vw;
    text-decoration: none;
    color: white;
    font-family: 'Times New Roman', Times, serif;
    margin-right: 10px;
}
.log-in{
    padding-top: 0.5%;
}

</style>