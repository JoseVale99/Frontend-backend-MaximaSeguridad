@extends('layouts.main')
@section('titulo', 'Cambiar contraseña')
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
                            <h1 class="h4 text-gray-900 mb-4">Cambiar su contraseña</h1>
                        </div>
                        <form  class="user" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->token }}">

                            <div class="form-group">
                                <label class="text-dark1  mx-3 h6">{{ __('Correo electrónico*') }}</label>
    
                                <div class="col-md-12">
                                    <input id="email" placeholder="Ingrese su correo electrónico" type="email" 
                                    class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="text-dark1 mx-3 h6">{{ __('Nueva contraseña*') }}</label>
    
                                <div class="col-md-12">
                                    <input id="password" placeholder="Su nueva contraseña" type="password"
                                     class="form-control form-control-user @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="text-dark1 mx-3 h6">{{ __('Confirmar Contraseña*') }}</label>
    
                                <div class="col-md-12">
                                    <input id="password-confirm" placeholder="Confirme su nueva contraseña" type="password"
                                     class="form-control form-control-user" name="password_confirmation"  autocomplete="new-password">
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
                                 <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __(' Guardar cambios') }}
                        </button>
                                
                        </form>
                        <hr>
                        
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