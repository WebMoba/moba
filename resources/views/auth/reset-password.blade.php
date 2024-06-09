@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Recuperar contraseña</h4>
                                    <p class="mb-0">Inserte su correo y espere unos segundos</p>
                                </div>
                                <div class="card-body">
                                    <!-- Mostrar mensajes de éxito -->
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <!-- Mostrar mensajes de error -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form role="form" method="POST" action="{{ route('reset.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                placeholder="Correo" value="{{ old('email') }}" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Enviar contraseña al
                                                correo</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="alert">
                                    @include('components.alert')
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://scontent.fsvz2-1.fna.fbcdn.net/v/t39.30808-6/278914238_2677449369066260_5540672770609077133_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGsLdji6aqTgBRD8mkzEUL3GYNsLiS-or0Zg2wuJL6ivbYxNa22fbHv1TUER6XofxXhE8ita-o5mBZyRTii6FY4&_nc_ohc=ex88HAAEcakQ7kNvgHiD2BQ&_nc_ht=scontent.fsvz2-1.fna&oh=00_AYD0pVJGpS7WgLZa79_JAw_8_r2RaNkSOF3zc_o03LC3sw&oe=6666FD6C');
                                        background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h2 class="mt-5 text-white font-weight-bolder position-relative">MOBA</h2>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Buena Onda"</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection