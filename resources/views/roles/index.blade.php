@extends('layouts.main')
@section('titulo', 'Roles')
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
                    <h1 class="h3 mb-2 bold-title text-upper"> Listado de Roles <i class="fas fa-dice-d20"></i></h1>
                    <p class="mb-4 text-dark">Consulte los datos de roles aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Búsqueda de roles por tipo y agregar roles</h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                            <div class="container">
                               @can('role.index')
                                <form action="{{ route('role.index', [$roles]) }}" method="GET"> 
                                                                    
                                    <div class="row">

                                        {{-- add product --}}
                                        <div class="col-md-3 mt-4">
                                            <div class="form-group">
                                                <a title="agregar rol" type="button" class="btn btn-outline-primary btn-auto mx-3 text-black2"
                                                    href="{{ route('role.create') }}">
                                                    Agregar rol <i class="fas fa-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mt-4">
                                            <div class="form-group">
                                                @php($arrayB = [
                                                    'NOMBRE',
                                                    'FECHA'
                                                    ])
                                                    <select title="buscar por" class="form-control" name="type">
                                                        @foreach ($arrayB as $buscar)
                                                       
                                                            <option>{{ $buscar }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <input class="form-control" name="buscarpor" type="search"
                                                        placeholder="Buscar">

                                                </div>
                                            </div>


                                            <div class="col-md-3 mt-4">
                                                <div class="form-group">
                                                    <button title="buscar" class="btn btn-outline-primary text-black2"
                                                        type="submit">Buscar</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    @endcan
                                </div>
                                {{-- end container --}}
                            </div>

                            @if ($roles->count()))
                            <div class="card-body ">
                                <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID</th>  
                                                <th scope="col">ROLE</th>
                                                <th scope="col">FECHA</th>
                                                <th colspan="2" scope="col">ACCIONES</th>
                                                {{-- <th scope="col">ELIMINAR</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @forelse ($roles as $rol)
                                                <tr class="table-hover">
                                                    
                                                    @can('role.show')
                                                    <td class="text-center">{{ $rol->id }}</td>
                                                    <td class="text-center">
                                                        <a class="text-center"
                                                            href="{{ route('role.show', [$rol]) }}">

                                                            {{ $rol->name }}</td>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">{{ $rol->created_at }}</td>
                                                    
                                                    <td class="text-center"  width="10px">
                                                        <a title="editar rol" href="{{ route('role.edit', [$rol]) }}"
                                                            class="btn btn-outline-primary btn-circle">
                                                            <i class="fa fa-edit"></i></a>

                                                    </td>
                                                    <td class="text-center" width="10px">
                                                        @can('role.destroy')
                                                        <form action="{{ route('role.destroy', [$rol]) }}" method="POST"> 
                                                            @csrf
                                                            @method("delete")
                                                           
                                                            <button title="borrar rol" type="submit" class="btn btn-outline-danger btn-circle btn-delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                               @endcan
                                                @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('role.index')}}" class="btn btn-outline-primary mx-3 mt-3" >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $roles->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $roles->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $roles->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $roles->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $roles->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('role.index')}}" class="btn btn-outline-primary" >regresar</a>
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
