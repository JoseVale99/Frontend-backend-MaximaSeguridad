@extends('layouts.main')
@section('titulo', 'Reestablecer contraseña')
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
                            <h1 class="h4 text-gray-900 mb-4">Restablecer la contraseña</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                           
                            <div class="form-group">
                                <label class="text-dark1  h6">Correo electrónico*</label>
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                  autocomplete="email" placeholder="Dirección de correo electrónico">
                            
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                                </div>
                             

                                <br><br><br><br>
                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                                {{ __('Enviar correo') }}
                            </button>
                            <hr>
                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook --}}
                            </a>
                        </form>
                      
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
