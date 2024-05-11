

<div style="width: 100%; display: flex; justify-content: space-between; margin-top: 0.7vw;">
    <div>
        <a href="{{ asset('/') }}" class="letter" >Volver</a> 
    </div>
    <div class="log-in">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="letter">Inicio</a>
            @else
                <a href="{{ route('login') }}" class="letter">Ingresar</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="letter">Registrarse</a>
                @endif
            @endauth
        @endif
    </div>
</div>

<style>
a.letter{
    display: inline-block;
    font-size: 0.9vw;
    text-decoration: none;
    color: #BCCCE0;
    font-family: 'Times New Roman', Times, serif;
    margin-right: 10px;
}
.log-in{
   padding-right: 0.4%;
}

</style>