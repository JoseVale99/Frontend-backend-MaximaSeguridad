@extends('plantilla.plantilla')
@section('titulo', 'Editar Permisos')
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
                    <h1 class="h3 mb-2 bold-title"> EDITAR PERMISO <i class="fas fa-user-edit mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Verifique los datos de sus usuarios aquí.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID PERMISO: {{ $permission->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                            <form method="POST" action="{{ route('permission.update', [$permission]) }}">
                                @method("PUT")
                                @csrf

                                <div class="row">

                               
                                <div class="col-md-12 mt-auto ">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del producto</label>
                                            <input type="text" name="name"
                                                value="{{ old('name', $permission->nombre) }}"
                                                placeholder="Introduce el nombre del permiso"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('name')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                   

                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <button title="guardar permiso" type="submit" class="btn btn-primary btn-ms">
                                                    Guardar <i class="fas fa-save"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <a title="cancelar permiso" href={{ route('permission.index') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
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
