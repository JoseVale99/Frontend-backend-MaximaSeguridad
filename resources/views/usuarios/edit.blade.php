@extends('plantilla.plantilla')
@section('titulo', 'Asignar Rol')
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
                @can('user.edit')
                <!-- Begin Page Content -->
                <div class="container-fluid rounded color">
                    <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 bold-title"> ASIGNAR ROL <i class="fas fa-user-edit mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Verifique los datos de los roles aquí.</p>

                    {{-- mensajes --}}
                    @include('plantilla.notification')
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID USUARIO: {{ $user->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                      

                                <div class="row">

                               
                                <div class="col-md-4 mt-auto ">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del usuario:</label>
                                            <input type="text" name="name"
                                                value="{{ old('name', $user->name) }}"
                                                placeholder="Introduce el nombre del rol"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('name')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                               
                               
                              
                               {!! Form::model($user, ['route'=>['user.update',$user],
                                'method'=>'PUT' ]) !!}
                                 <div class="col-md-4 mt-2">
                                    <h2 class=" text-black"> Listado de roles: </h2>
                                @foreach ($roles as $role) 
                                    <div class="">
                                        <label class="text-black2 h6">
                                            {!!Form::checkbox(
                                                'roles[]',
                                                   $role->id, null,
                                                   ['class'=>'mr-1']) !!} 
                                                   {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                                     </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        {!! Form::submit("Asignar Rol", ["title"=>"asignar rol","class"=>'btn btn-outline-primary mt-2']) !!}
                                    </div>
                                   
                               </div>
                            
                                 {!!Form::close() !!}
                                


                                <br><br><br>
                              
                                   

                                </div>




                            </div>
                            <br>



                        </div>
                        @endcan
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
