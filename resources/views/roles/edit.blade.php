@extends('plantilla.plantilla')
@section('titulo', 'Editar Rol')
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
                    <h1 class="h3 mb-2 bold-title"> EDITAR ROL <i class="fas fa-user-edit mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Verifique los datos de los roles aquí.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID ROL: {{ $role->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                            
                                {!! Form::model($role,['route'=> ['role.update',$role], 'method'=>'PUT']) !!}
                                @include('roles.partials.form')
                                {!! Form::submit('Editar rol', ['title'=>'editar rol' ,'class'=>'btn btn-outline-primary']) !!}
                                {!! Form::close() !!}

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
