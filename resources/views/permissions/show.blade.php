@extends('layouts.main')
@section('titulo', 'Ver Permisos')
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
                    <h1 class="h3 mb-2 bold-title"> MOSTRAR PERMISO <i class="fas fa-eye mx-3"></i></h1>
                    <p class="mb-4 text-dark">Verifique los datos de sus usuarios aquí.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID PERMISO: {{ $permission->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                    
                                <div class="row justify-content-md-center">
                                  
                                         
                                    <div class="card border-dark mb-3 mt-4" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                          <div class="col-md-4 mt-4">
                                            <img class="img-fluid" 
                                            src="https://image.flaticon.com/icons/png/512/1077/1077012.png" alt="user">
                                            <br><br>
                                        </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title text-upper">{{ $permission->nombre }}</h5>
                                              <p class="card-text text-black">{{ $permission->guard_name }}</p>
                                              <p class="card-text text-black"><small class="text-muted">{{$permission->created_at}}</small></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <a href="{{ route('permission.edit', [$permission]) }}" class="btn btn-primary btn-ms">
                                                    ir a editar <i class="fas fa-pen-square"></i> </a>
                                            </div>
                                            <div class="col-auto">
                                                <a href={{ route('permission.index') }} class="btn btn-danger btn-ms">cancelar
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
