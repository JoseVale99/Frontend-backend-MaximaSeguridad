@extends('plantilla.plantilla')
@section('titulo', 'Crear Permisos')
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
                    @csrf
                    <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 bold-title"> REGISTAR UN PERMISO <i class="fas fa-plus-circle mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Registre un permiso aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">Agregar permiso</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                            <form method="POST" action="{{ route('permission.store') }}">

                                @csrf
                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del permiso</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Introduce el nombre del permiso"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('name')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                   

                                    {{-- <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Modelo</label>
                                            @php($modelos = ['HFW1200TA28', 'PB401', 'IP66', 'SMARTCAM', 'ONVIF', 'IP67',
                                                'XVR1A04', 'S8-TURBO-L', 'XVR5104HE-X1', 'DH-XVR1A04', 'XVR1A08',
                                                'DS-7104HGHI-F1(S)', 'EV4016TURBO', 'S16 TURBO', 'CCTV BNC VIDEO', 'CCTV UTP'])

                                                <select class="form-control" name="modelo" value="{{ old('modelo') }}">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($modelos as $mod)

                                                        @if (old('modelo') == $mod)
                                                            <option selected="selected">{{ $mod }}</option>
                                                        @else
                                                            <option>{{ $mod }}</option>
                                                        @endif --}}

                                                    {{-- @endforeach --}}
                                                {{-- </select> --}}
                                                {{-- validaciones --}}
                                                {{-- @error('modelo')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                        {{-- </div> --}}
    
                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary btn-ms">
                                                    Guardar <i class="fas fa-save"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <a href={{ route('permission.index') }} class="btn btn-danger btn-ms">cancelar
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

            <script>
                document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                  var name = document.getElementById("customFileInput").files[0].name;
                  var nextSibling = e.target.nextElementSibling
                  nextSibling.innerText = name
                })
              </script>
        @endsection
