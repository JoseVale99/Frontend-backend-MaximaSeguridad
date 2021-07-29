@extends('layouts.main')
@section('titulo', 'Ver Producto')
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
                    <h1 class="h3 mb-2 bold-title"> MOSTRAR PRODUCTO <i class="fas fa-eye mx-3"></i></h1>
                    <p class="mb-4 text-dark">Verifique los datos de su producto aquí.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID PRODUCTO: {{ $producto->id }}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                           
                            <form method="POST" action="{{ route('productos.update', [$producto]) }}" class="container">
                                @method("PUT")
                                @csrf

                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                            <img class="img-fluid rounded" src="{{$producto->imagen}}" width="300px" height="200px" alt="">
                                    </div>

                                    <div class="col-md-4 mt-auto ">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del producto</label>
                                            <input type="text" disabled="true" value="{{ $producto->nombre }}"
                                                placeholder="Introduce el nombre del producto" class="form-control"
                                                name="nombre" required value="">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-auto">
                                        <div class="form-group">
                                            <label class="text-black h4">Existencia</label>
                                            <input type="number" disabled="true" value="{{ $producto->stock }}"
                                                placeholder="En existencia" class="form-control" name="stock">
                                        </div>
                                    </div>

                                    <div class="col-md-8 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Descripción</label>
                                            <textarea class="form-control" disabled="true"
                                                name="descripcion">{{ $producto->descripcion }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Modelo</label>
                                            @php($modelos = ['HFW1200TA28', 'PB401', 'IP66', 'SMARTCAM', 'ONVIF', 'IP67',
                                                'XVR1A04', 'S8-TURBO-L', 'XVR5104HE-X1', 'DH-XVR1A04', 'XVR1A08',
                                                'DS-7104HGHI-F1(S)', 'EV4016TURBO', 'S16 TURBO', 'CCTV BNC VIDEO', 'CCTV UTP'])

                                                <select class="form-control" disabled="true" name="modelo">
                                                    <option disabled>modelo</option>
                                                    @foreach ($modelos as $mod)
                                                        <option @if ($producto->modelo == $mod) selected @endif>{{ $mod }}
                                                        </option>

                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4">
                                            <div class="form-group">
                                                <label class="text-black h4">Tipo</label>
                                                @php($tipos = ['IP', 'SEGURIDAD', 'BULLET', 'DOMO', '8 CANALES', '4 CANALES',
                                                    '16 CANALES', 'P/TRANSMISION DE VIDEO'])
                                                    <select class="form-control" id="tipo" name="tipo" disabled="true">
                                                        @foreach ($tipos as $type)
                                                            <option @if ($producto->tipo == $type) selected @endif>{{$type}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio compra</label>
                                                    <input type="text" disabled="true" value="{{ $producto->precio_c }}"
                                                        placeholder="Introduce precio del producto 0.0 $" class="form-control"
                                                        name="precio" required value="">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Precio venta</label>
                                                    <input type="text" disabled="true" value="{{ $producto->precio_v }}"
                                                        placeholder="Introduce precio del producto 0.0 $" class="form-control"
                                                        name="precio" required value="">
                                                </div>
                                            </div>

                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                @can('productos.edit')
                                                <a title="ir a editar" href="{{ route('productos.edit', [$producto]) }}" class="btn btn-primary btn-ms">
                                                    ir a editar <i class="fas fa-pen-square"></i> </a>
                                                    @endcan
                                                </div>
                                            <div class="col-auto">
                                                <a title="cancelar" href={{ route('productos.index') }} class="btn btn-danger btn-ms">cancelar
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
