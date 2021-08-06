@extends('layouts.main')
@section('titulo', 'Mi perfil')
@section('contenido')

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- incluimos sildebar color: azul :) --}}
        @include('plantilla.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.nav-log')

                <!-- Begin Page Content -->
                <div class="container-fluid rounded color">
                    <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 bold-title"> Mi Perfil de usuario<i class="fas fa-user mx-3"></i></h1>
                    <p class="mb-4 text-dark"></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold "> {{ Auth::user()->name }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">

                            <form method="POST" action="{{ route('user.editar', $user->id) }}"  enctype="multipart/form-data">
                                @method('put')
                                    @csrf

                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="text-center">
                                        <img class="img-responsive rounded-circle" src="{{$user->photo}}" width="50%" alt="">

                                    </div>
                            </div>

                                <div class="col-md-4 mt-auto ">
                                    <div class="form-group">
                                        <label class="text-black h4">Nombre*</label>
                                        <input type="text"  value="{{ $user->name }}"
                                            placeholder="Introduce tu nombre" class="form-control" name="name" required
                                            value="">
                                    </div>
                                 {{-- validaciones --}}
                                 @error('name')
                                 <div class="message-error">*{{ $message }}</div>
                             @enderror
                                </div>
                                <div class="col-md-4 mt-auto">
                                    <div class="form-group">
                                        <label class="text-black h4">Nombre de usuario*</label>
                                        <input type="text"  value="{{ $user->username }}"
                                            placeholder="Introduce tu correo electrónico" class="form-control"
                                            name="username">
                                    </div>
                                
                                 {{-- validaciones --}}
                                 @error('username')
                                 <div class="message-error">*{{ $message }}</div>
                             @enderror
                                </div>

                                <div class="col-md-4 mt-auto">
                                    <div class="form-group">
                                        <label class="text-black h4">Correo electrónico*</label>
                                        <input type="email" value="{{ $user->email }}"
                                            placeholder="Introduce tu correo electrónico" class="form-control" name="email">
                                    </div>
                                
                                 {{-- validaciones --}}
                                 @error('email')
                                 <div class="message-error">*{{ $message }}</div>
                             @enderror
                                </div>






                                <div class="col-md-8 mt-4">
                                    <div class="form-group">
                                        <label class="text-black h4">Agregar imagen</label>
                                        
                                        {{-- small class="text-dark"> --}}
                                        <small class="text-dark"> <input type="checkbox" class="check-input mx-3" name="check"
                                        @if (old('check')=="on")
                                        checked
                                        @endif
                                        >¿Desea modificar la imagen? active aqui.</small> 
                                            @if (old('check')=="on")
                                              
                                            <input type="file" accept="image/*" name="photo"
                                            placeholder="Inserte una imagen" class="form-control text-upper">
                                             {{-- validaciones --}}
                                       
                                             @error('photo')
                                             <div class="message-error">*{{ $message }}</div>
                                         @enderror
                                             
                                            @endif 
                                         
                                            
                                           
                                           
                                       
                                    </div>
                                </div>

                            </div>

                            {{-- PARTE BOTONES --}}
                            <div class="row justify-content-center">
                                <div class="col-auto mt-4">
                                    <button title="guardar datos de usuario" type="submit" class="btn btn-primary btn-ms">
                                        Guardar <i class="fas fa-save"></i></button>
                                </div>
                                <div class="col-auto mt-4">
                                    <a title="cancelar" href={{route('user.profile')}}
                                        class="btn btn-success btn-ms">Regresar
                                        </a>
                                </div>
                            </div>
                            <br>
                            </form>

                        </div>
                    </div>
                    <br>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('plantilla.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@endsection
