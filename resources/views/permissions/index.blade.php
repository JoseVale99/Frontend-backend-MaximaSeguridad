@extends('layouts.main')
@section('titulo', 'Permisos')
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
                    <h1 class="h3 mb-2 bold-title text-upper"> Listado de Permisos <i class="fas fa-user-cog"></i></h1>
                    <p class="mb-4 text-dark">Consulte los datos de usuarios aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Búsqueda de usuarios por tipo y agregar permisos</h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                            <div class="container">
                                <form action="{{ route('permission.index', [$permissions]) }}" method="GET"> 
                                                                    
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-auto pt-3">
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

                                            <div class="col-md-auto pt-3">
                                                <div class="form-group">
                                                    <input class="form-control" name="buscarpor" type="search"
                                                        placeholder="Buscar">

                                                </div>
                                            </div>


                                            <div class="col-md-auto pt-3">
                                                <div class="form-group">
                                                    <button title="buscar permisos" class="btn btn-outline-primary text-black2"
                                                        type="submit">Buscar</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                                {{-- end container --}}
                            </div>

                            @if ($permissions->count()))
                            <div class="card-body ">
                                <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID</th>
                                               
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">GUAR</th>
                                                <th scope="col">FECHA</th>
                                                <th colspan="2" scope="col">ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @forelse ($permissions as $permission)
                                                <tr class="table-hover">
                                                    
                                                    
                                                    <td class="text-center">{{ $permission->id }}</td>
                                                    <td class="text-center">{{ $permission->name }}</td>
                                                    
                                                    <td class="text-center">{{ $permission->guard_name }}</td>
                                                    <td class="text-center">{{ $permission->created_at }}</td>
                                                    
                                                    <td class="text-center">
                                                        <a title="editar permiso" href="{{ route('permission.edit', [$permission]) }}"
                                                            class="btn btn-outline-primary btn-circle">
                                                            <i class="fa fa-edit"></i></a>

                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('permission.destroy', [$permission]) }}" method="post"> 
                                                            @csrf
                                                            @method("delete")
                                                           
                                                            <button title="borrar permiso" type="submit" class="btn btn-outline-danger btn-circle btn-delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @empty
                                                <h3 class="text-black text-center"> ¡No hay registros!</h3>
                                                @endforelse
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('permission.index')}}" class="btn btn-outline-primary mx-3 mt-3 " >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $permissions->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $permissions->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $permissions->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $permissions->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $permissions->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('permission.index')}}" class="btn btn-outline-primary" >regresar</a>
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
