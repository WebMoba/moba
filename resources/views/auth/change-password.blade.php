@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.guest.navbar')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Cambiar contraseña</h4>
                                    <p class="mb-0">Establece tu nueva contraseña</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('change.perform') }}">
                                        @csrf

                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Correo" value="{{ old('email') }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Nueva contraseña" aria-label="Password" >
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="confirm-password" class="form-control form-control-lg" placeholder="Confirmar contraseña" aria-label="Password"  >
                                            @error('confirm-password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Enviar</button>
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
                                style="background-image: url('https://scontent.fbog11-1.fna.fbcdn.net/v/t39.30808-6/434970802_1028197468733796_7245314648527517887_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGdkQYTveq_5YET8H3iWIiaRA2b8rYUMZNEDZvythQxk918gU142kZ2SI-m3amD8by10a8lTTK_jwj1AKPJMj0U&_nc_ohc=secUSRvIaI0Q7kNvgGKyX6_&_nc_zt=23&_nc_ht=scontent.fbog11-1.fna&oh=00_AYAeGqwZIh06Db9f24pXC8wmUM43_9eLYjj9L6KOeJtYZQ&oe=666514A0');
              background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h2 class="mt-5 text-white font-weight-bolder position-relative">"MOBA"</h2>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Buena Onda"</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
