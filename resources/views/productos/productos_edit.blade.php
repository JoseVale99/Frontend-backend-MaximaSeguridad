@extends('plantilla.plantilla')
@section('titulo', 'Editar Producto')
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
                    <h1 class="h3 mb-2 bold-title"> EDITAR PRODUCTO <i class="fas fa-user-edit mx-3"></i> </h1>
                    <p class="mb-4 text-dark">Verifique los datos de su producto aquí.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID producto: {{ $producto->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                           
                            <form method="POST" action="{{ route('productos.update', [$producto]) }}" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf

                                <div class="row">

                                    <div class="col-md-4 mt-4">
                                        <img class="img-fluid border-image" src="{{$producto->imagen}}"  height="200px" width="300px" alt="">
                                </div>

                                <div class="col-md-4 mt-auto ">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del producto</label>
                                            <input type="text" name="nombre"
                                                value="{{ old('nombre', $producto->nombre) }}"
                                                placeholder="Introduce el ombre del producto"
                                                class="form-control text-upper" name="nombre">
                                            {{-- validaciones --}}
                                            @error('nombre')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-auto">
                                        <div class="form-group">
                                            <label class="text-black h4">Existencia</label>
                                            <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}"
                                                placeholder="En existencia" class="form-control text-upper" min="1"
                                                name="stock">
                                            {{-- validaciones --}}
                                            @error('stock')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-8 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Descripción</label>
                                            <textarea class="form-control text-upper"
                                                name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
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

                                                {{-- <select class="form-control" name="modelo">
                                                    @foreach ($modelos as $mod)
                                                        <option @if (old('modelo', $producto->modelo) == $mod) selected @endif>{{ $mod }}
                                                        </option>

                                                    @endforeach
                                                </select> --}}
                                                {{-- validaciones --}}
                                                <input type="text" value="{{ old('',$producto->modelo) }}"
                                                placeholder="Modelo" class="form-control text-upper" 
                                                 disabled>

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

                                                    <select class="form-control" id="tipo" name="tipo">
                                                        @foreach ($tipos as $type))
                                                            <option @if (old('tipo', $producto->tipo) == $type) selected @endif>
                                                                {{ $type }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}

                                                    <input type="text" value="{{ old('tipo', $producto->tipo) }}"
                                                placeholder="Modelo" class="form-control text-upper" 
                                                name="tipo">
                                                    {{-- validaciones --}}
                                                    @error('tipo')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio compra $</label>
                                                    <input type="number" name="precio_c"
                                                        value="{{ old('precio_c', $producto->precio_c) }}"
                                                        placeholder="Introduce precio del producto 0.0 $"
                                                        class="form-control text-upper" name="precio">
                                                    {{-- validaciones --}}
                                                    @error('precio_c')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio venta $</label>
                                                    <input type="number" name="precio_v"
                                                        value="{{ old('precio_v', $producto->precio_v) }}"
                                                        placeholder="Introduce precio del producto 0.0 $"
                                                        class="form-control text-upper" name="precio">

                                                    {{-- validaciones --}}
                                                    @error('precio_v')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
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
                                                          
                                                        <input type="file" accept="image/*" name="imagen"
                                                        placeholder="Inserte una imagen" class="form-control text-upper">
                                                         {{-- validaciones --}}
                                                   
                                                         @error('imagen')
                                                         <div class="message-error">*{{ $message }}</div>
                                                     @enderror
                                                         
                                                        @endif 
                                                     
                                                        
                                                       
                                                       
                                                   
                                                </div>
                                            </div>


                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <button title="guardar producto" type="submit" class="btn btn-primary btn-ms">
                                                    Guardar <i class="fas fa-save"></i></button>
                                            </div>
                                            <div class="col-auto">
                                            @can('productos.index')
                                                <a  title="cancelar" href={{ route('productos.index') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
                                            @endcan
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
