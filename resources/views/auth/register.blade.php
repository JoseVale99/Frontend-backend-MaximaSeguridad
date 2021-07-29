@extends('layouts.main')
@section('titulo', 'Registrarse')
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
                <div class="col-lg-5 d-none d-lg-block login-img"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Dar de alta un nuevo usuario</h1>
                        </div>
                        <form class="user"method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                {{-- <label class="text-black  h4">Nombre</label> --}}
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                     autocomplete="name" autofocus placeholder="Nombre">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" 
                                     autocomplete="username"  placeholder="Nombre de usuario">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                  autocomplete="email" placeholder="Dirección de correo electrónico">
                            
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                                </div>
                                <span class="text-primary">Los caracteres deben ser de al menos 8 dígitos</span>

                                <div class="form-group row" id="show_hide_password">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" 
                                     autocomplete="new-password" placeholder="Contraseña">
                                     
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" 
                                      autocomplete="new-password" placeholder="Repite la contraseña">
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
                            <br>
                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                                {{ __('Registrar Cuenta') }}
                            </button>
                            <hr>
                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook --}}
                            </a>
                        </form>
                        {{-- <hr> --}}
                        <div class="text-center">
                            @if (Route::has('password.request'))
                            <a class="small"href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? ¡Acceso!</a>
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
