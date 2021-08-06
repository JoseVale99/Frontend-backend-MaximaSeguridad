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

                    @include('plantilla.notification')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold "> {{ Auth::user()->name }}</h6>
                        </div>

                      
                        {{-- Formulario -> vista de usuario --}}

                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <div class="text-center">
                                        <img class="img-responsive rounded-circle" src="{{$user->photo}}" width="50%" alt="">

                                    </div>
                            </div>

                                <div class="col-md-4 mt-auto ">
                                    <div class="form-group">
                                        <label class="text-black h4">Nombre</label>
                                        <input type="text" disabled="true" value="{{ $user->name }}"
                                            placeholder="Introduce tu nombre" class="form-control" name="name" required
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-auto">
                                    <div class="form-group">
                                        <label class="text-black h4">Nombre de usuario</label>
                                        <input type="text" disabled="true" value="{{ $user->username }}"
                                            placeholder="Introduce tu correo electrónico" class="form-control"
                                            name="username">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-auto">
                                    <div class="form-group">
                                        <label class="text-black h4">Correo electrónico</label>
                                        <input type="email" disabled="true" value="{{ $user->email }}"
                                            placeholder="Introduce tu correo electrónico" class="form-control" name="email">
                                    </div>
                                </div>




                            </div>

                            {{-- PARTE BOTONES --}}
                            <div class="row justify-content-center">
                                <div class="col-auto mt-4">
                                    {{-- @can('productos.edit') --}}
                                        <a title="Edita tus datos" 
                                        href="{{ route('user.show',$user->id) }}"
                                            class="btn btn-primary">
                                            Editar  <i class="fas fa-pen-square"></i> </a>
                                    {{-- @endcan --}}
                                </div>
                                <div class="col-auto mt-4">
                                    <a title="cancelar" href={{url('/')}}
                                        class="btn btn-danger ">cancelar
                                        <i class="fas fa-strikethrough"></i></a>
                                </div>
                            </div>
                            <br>

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
