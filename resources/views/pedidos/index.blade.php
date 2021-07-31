@extends('layouts.main')
@section('titulo', 'Ver citas')
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
                    <h1 class="h3 mb-2 bold-title text-upper"> Pedidos <i class="fas fa-clipboard-list"></i></h1>

                    <p class="mb-4 text-dark">Consulte los datos de pedidos aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Búsqueda de pedidos por tiipo</h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                            <div class="container">
                                <form action="{{ route('pedido.index', [$pedidos]) }}" method="GET">
                                    <div class="row justify-content-md-center">
             

                                        <div class="col-md-auto pt-3">
                                            <div class="form-group">
                                                @php($arrayB = [
                                                    'nombre',
                                                    'productos',
                                                    'direccion',
                                                    'telefono',
                                                    'fecha'
                                                    // 'PRECIO COMPRA','PRECIO VENTA'
                                                    ])
                                                    <select title="buscar por" class="form-control text-upper" name="tipos">
                                                        @foreach ($arrayB as $buscar)
                                                            <option>{{ $buscar }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-auto pt-3">
                                                <div class="form-group">
                                                    <input class="form-control" name="buscar" type="search"
                                                        placeholder="Buscar">

                                                </div>
                                            </div>


                                            <div class="col-md-auto pt-3">
                                                <div class="form-group">
                                                    <button title="buscar pedido" class="btn btn-outline-primary text-black2"
                                                        type="submit">Buscar</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                {{-- end container --}}
                            </div>
                            @if ($pedidos->count()))
                            <div class="card-body ">
                                <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID PEDIDO</th>
                                                <th scope="col">ID CLIENTE</th>
                                                <th scope="col">NOMBRE CLIENTE</th>
                                                <th scope="col">TOTAL VENTA</th>
                                                <th scope="col">PRODUCTOS</th>
                                                <th scope="col">DIRECCIÓN</th>
                                                <th scope="col">TELÉFONO</th>
                                                
                                                <th scope="col">FECHA</th>
                                            
                                                <th scope="col">BORRAR</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @foreach ($pedidos as $pedido)
                                                <tr class="table-hover">
                                                    <th scope="row">{{ $pedido->id}}</th>
                                                    <th scope="row">{{ $pedido->id_cliente}}</th>
                                                    <td>
                                                        {{-- <a class="text-center"
                                                            href="{{ route('productos.show', [$producto]) }}"> --}}

                                                            {{ $pedido->nombre }}
                                                        {{-- </a> --}}
                                                    </td>

                                                    <td class="text-center">$ {{$pedido->total_venta }} MXN</td>
                                                    <td class="text-justify">{{ $pedido->productos }}</td>
                                                    <td class="text-center">{{ $pedido->direccion }}</td>
                                                    <td class="text-center">{{ $pedido->telefono }}</td>
                                                    <td class="text-center">{{ $pedido->fecha}}</td>
                                                    
                                                    
                                                    <td>
                                                        @can('pedido.destroy')
                                                        <form action="{{route('pedido.destroy', $pedido->id)}}"
                                                            method="POST">
                                                            @method("delete")
                                                            @csrf
                                                            <button title="borrar pedido" type="submit" class="btn btn-outline-danger btn-circle btn-delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                               
                                         @endforeach
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('pedido.index')}}" class="btn btn-outline-primary mx-3 mt-3 " >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $pedidos->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $pedidos->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $pedidos->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $pedidos->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $pedidos->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('pedido.index')}}" class="btn btn-outline-primary" >regresar</a>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 mt-4">
                                    <div class="form-group">
                                        
                                            <strong class ="card-title">¡No hay registros!</strong>
                                       
                                    </div>
                                </div>
                            </div>
                               
                                
                                 </div>
                             @endif
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
