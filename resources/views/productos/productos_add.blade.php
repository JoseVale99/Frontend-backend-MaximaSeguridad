@extends('plantilla.plantilla')
@section('titulo', 'Agregar Producto')
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
                    <h1 class="h3 mb-2 bold-title"> REGISTRAR PRODUCTO <i class="fas fa-plus-circle mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Registre su producto aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">Agregar producto</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        
                        <div class="container">
                           
                            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">

                                @csrf
                                <div class="row">

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del producto</label>
                                            <input type="text" name="nombre" value="{{ old('nombre') }}"
                                                placeholder="Introduce el nombre del producto"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('nombre')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-8 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Descripción</label>
                                            <textarea class="form-control text-upper"
                                                placeholder="Descripción del producto..."
                                                name="descripcion">{{ old('descripcion') }}</textarea>

                                            {{-- validaciones --}}
                                            @error('descripcion')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Modelo</label>
                                            {{-- @php($modelos = ['HFW1200TA28', 'PB401', 'IP66', 'SMARTCAM', 'ONVIF', 'IP67',
                                                'XVR1A04', 'S8-TURBO-L', 'XVR5104HE-X1', 'DH-XVR1A04', 'XVR1A08',
                                                'DS-7104HGHI-F1(S)', 'EV4016TURBO', 'S16 TURBO', 'CCTV BNC VIDEO', 'CCTV UTP']) --}}

                                                {{-- <select class="form-control" name="modelo" value="{{ old('modelo') }}">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($modelos as $mod)

                                                        @if (old('modelo') == $mod)
                                                            <option selected="selected">{{ $mod }}</option>
                                                        @else
                                                            <option>{{ $mod }}</option>
                                                        @endif

                                                    @endforeach
                                                </select> --}}
                                                {{-- validaciones --}}
                                                <input type="text" name="modelo" value="{{ old('modelo') }}"
                                                placeholder="Introduce el modelo del producto"
                                                class="form-control text-upper">
                                                @error('modelo')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4">
                                            <div class="form-group">
                                                <label class="text-black h4">Tipo</label>
                                                {{-- @php($tipos = ['IP', 'SEGURIDAD', 'BULLET', 'DOMO', '8 CANALES', '4 CANALES',
                                                    '16 CANALES', 'P/TRANSMISION DE VIDEO'])
                                                    <select class="form-control" name="tipo">
                                                        <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                        @foreach ($tipos as $type)

                                                            @if (old('tipo') == $type)
                                                                <option selected="selected">{{ $type }}</option>
                                                            @else
                                                                <option>{{ $type }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select> --}}

                                                    <input type="text" name="tipo" value="{{ old('tipo') }}"
                                                placeholder="Introduce el tipo del producto"
                                                class="form-control text-upper">

                                                    {{-- validaciones --}}
                                                    @error('tipo')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio compra $</label>
                                                    <input type="number" name="precio_c" value="{{ old('precio_c') }}"
                                                        placeholder="Introduce precio del producto 0.0 $"
                                                        class="form-control text-upper">

                                                    {{-- validaciones --}}
                                                    @error('precio_c')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio venta $</label>
                                                    <input type="number" name="precio_v" value="{{ old('precio_v') }}"
                                                        placeholder="Introduce precio del producto 0.0 $"
                                                        class="form-control text-upper">

                                                    {{-- validaciones --}}
                                                    @error('precio_v')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Existencia</label>
                                                    <input type="number" name="stock" value="{{ old('stock') }}"
                                                        placeholder="En existencia" class="form-control text-upper" min="1">

                                                    {{-- validaciones --}}
                                                    @error('stock')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Agregar imagen</label>
                                                    
                                                      <!-- Upload image input-->
                                                      
                                                        <input type="file"  name="imagen"  accept="image/*"
                                                        placeholder="Inserte una imagen" class="form-control text-upper">
                                                

                                                    {{-- validaciones --}}
                                                    @error('imagen')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            
                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <button title="guardar producto" type="submit" class="btn btn-primary btn-ms">
                                                    Guardar <i class="fas fa-save"></i></button>
                                            </div>
                                            @can('productos.index')
                                            <div class="col-auto">
                                                <a title="cancelar producto" href={{ route('productos.index') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
                                            </div>
                                        @endcan
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
