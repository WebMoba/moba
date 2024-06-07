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
                    <div class="row" style="margin-left:0;">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start"><a href="{{ asset('/') }}"
                                        class="btn btn-primary" style=""><i class="bi bi-arrow-left-circle"></i><span
                                            class="tooltiptext">Volver</span></a>
                                    <h4 class="font-weight-bolder">Iniciar Sesión</h4>
                                    <p class="mb-0">Ingresa tu email y contraseña para ingresar</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                value="{{ old('email') ?? 'Moba@ejemplo.com' }}" aria-label="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                aria-label="Password" value="********">
                                            @error('password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Recuerdame</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        Has olvidado tu contraseña? Recupera tu contraseña
                                        <a href="{{ route('reset-password') }}"
                                            class="text-primary text-gradient font-weight-bold">aqui</a>
                                    </p>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        No tienes una cuenta?
                                        <a href="{{ route('register') }}"
                                            class="text-primary text-gradient font-weight-bold">Registrarse</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://scontent.fsvz2-1.fna.fbcdn.net/v/t39.30808-6/298667640_588330729387141_5159845902066760305_n.png?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGuYIikel_pb_-8pvPPRnYifkC76S24p-h-QLvpLbin6L6sZaqdoocCug6P5mMGnW-qsqiryrR6IGkP2uXVN9b_&_nc_ohc=pYs4hTP0CSYQ7kNvgFt-owT&_nc_ht=scontent.fsvz2-1.fna&oh=00_AYCKoYww5vBgeSzLxb5vRwY8JF_S_QPrFDlhECm-ieQqaQ&oe=66670BC7'); background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h1 class="mt-5 text-white font-weight-bolder position-relative">MOBA</h1>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Buena Onda"</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
