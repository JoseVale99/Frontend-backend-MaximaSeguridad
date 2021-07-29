@extends('layouts.main')
@section('titulo', 'login')
@section('contenido')
    @include('layouts.nav-log')

    <div class="bg-color">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-login my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block login-img"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
         
                                            <div class="form-group">
                                                <label class="text-dark1 h6">{{ __('Usuario*') }}</label>
                                                <input id="username" type="text"
                                                    class="form-control form-control-user @error('username') is-invalid @enderror"
                                                    name="username" value="{{ old('username') }}" autocomplete="username"
                                                    autofocus placeholder="Ingrese nombre de usuario o correo electrónico">

                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label class="text-dark1 h6">{{ __('Contraseña*') }}</label>
                                            <div class="form-group row" id="show_hide_password">
                                                <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input id="password" type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    name="password"  autocomplete="current-password"
                                                    placeholder="Contraseña">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input class="custom-control-input" type="checkbox" name="pass"
                                                    id="mostrar_contrasena">
                                                    <label class="custom-control-label text-dark" for="mostrar_contrasena">
                                                        {{ __('Mostrar contraseña') }}
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input class="custom-control-input" type="checkbox" name="remember"
                                                        id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label text-dark" for="customCheck">
                                                        {{ __('Recuérdame') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Ingresar') }}
                                            </button>
                                            
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">¿Has
                                                    olvidado tu contraseña?</a>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">¡Crea una cuenta!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <br><br><br><br>
    </div>
     <!-- Footer -->
     @include('plantilla.footer')
     <!-- End of Footer -->
    @endsection