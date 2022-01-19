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
                    <h1 class="h3 mb-2 bold-title"> CITAS <i class="fas fa-clipboard-list"></i></h1>

                    <p class="mb-4 text-dark">Consulte los datos de citas aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Búsqueda de citas por tipo y ver citas</h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                            <div class="container">
                                <form action="{{ route('cita.index', [$citas]) }}" method="GET">
                                    <div class="row justify-content-md-center">
             

                                        <div class="col-md-auto pt-3">
                                            <div class="form-group">
                                                @php($arrayB = [
                                                    'nombre',
                                                    'descripcion',
                                                    'entidad',
                                                    'referencias',
                                                    'fecha'
                                                    // 'PRECIO COMPRA','PRECIO VENTA'
                                                    ])
                                                    <select class="form-control text-upper" name="tipos" title="buscar por" >
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
                                                    <button title="buscar citas" class="btn btn-outline-primary text-black2"
                                                      title=" buscar"  type="submit">Buscar</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                {{-- end container --}}
                            </div>
                            @if ($citas->count()))
                            <div class="card-body ">
                                <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID CITA</th>
                                                <th scope="col">ID CLIENTE</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">TELEFONO</th>
                                                <th scope="col">DIRECCIÓN</th>
                                                <th scope="col">REFERENCIAS</th>
                                                <th scope="col">ENTIDAD</th>
                                                <th scope="col">TIPO ATENCIÓN</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col">DESCRIPCIÓN</th>
                                        
                                                <th scope="col">BORRAR</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @foreach ($citas as $cita)
                                                <tr class="table-hover">
                                                    <th scope="row">{{ $cita->id}}</th>
                                                    <th scope="row">{{ $cita->id_cliente}}</th>
                                                    <td>
                                                        {{-- <a class="text-center"
                                                            href="{{ route('productos.show', [$producto]) }}"> --}}

                                                            {{ $cita->nombre }}
                                                        {{-- </a> --}}
                                                    </td>

                                                    <td class="text-center">{{$cita->telefono }}</td>
                                                    <td class="text-center">{{ $cita->direccion }}</td>
                                                    <td class="text-center">{{ $cita->referencias }}</td>
                                                    <td class="text-center">{{ $cita->entidad }}</td>
                                                    <td class="text-center">{{ $cita->tipo_atencion}}</td>
                                                    <td class="text-center">{{ $cita->fecha}}</td>
                                                    <td class="text-center">{{ $cita->descripcion}}</td>
                                                    
                                                    <td>
                                                        @can('cita.destroy')
                                                        <button class="btn btn-danger  btn-circle" data-toggle="modal"
                                                        data-target="#exampleModal{{ $cita->id }}" type="button">
                                                        <i class="fa fa-trash"></i></button>
                                                        <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $cita->id}}" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                        <form action="{{route('cita.destroy', $cita->id)}}"
                                                            method="POST">
                                                            @method("delete")
                                                            @csrf
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Borrar cita
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ¿Desea eliminar esta cita?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-danger">Delete
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        @endcan
                                                    </td>
                                                </tr>
                                               
                                         @endforeach
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('cita.index')}}" class="btn btn-outline-primary mx-3 mt-3 " >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $citas->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $citas->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $citas->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $citas->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $citas->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('cita.index')}}" class="btn btn-outline-primary" >regresar</a>
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
