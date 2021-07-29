@extends('layouts.main')
@section('titulo', 'Factura')
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
                    <h1 class="h3 mb-2 bold-title text-upper"> Nota de pago <i class="fas fa-file-invoice"></i></h1>

                    <p class="mb-4 text-dark">Consulte su nota de pago aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Historial de pagos </h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                                {{-- end container --}}
                            </div>
                            @if ($invoices->count()))
                            <div class="card-body ">
                                <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID </th> 
                                                <th scope="col">ID CLIENTE</th>
                                                <th scope="col">NOMBRE CLIENTE</th>
                                                <th scope="col">TOTAL VENTA</th>
                                                <th scope="col">PRODUCTOS</th>
                                                <th scope="col">DIRECCIÓN</th>
                                                <th scope="col">TELÉFONO</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col"> DESCARGAR</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @foreach ($invoices as $invoice)
                                                <tr class="table-hover">
                                                    
                                                    <th scope="row">{{ $invoice->id}}</th>
                                                    <th scope="row">{{ $invoice->id_cliente}}</th>
                                                    <td>
                                                            {{ $invoice->nombre }}
                                                        
                                                    </td>

                                                    <td class="text-center">$ {{$invoice->total_venta }} MXN</td>
                                                    <td class="text-justify">{{ $invoice->productos }}</td>
                                                    <td class="text-center">{{ $invoice->direccion }}</td>
                                                    <td class="text-center">{{ $invoice->telefono }}</td>
                                                    <td class="text-center">{{ $invoice->fecha}}</td>
                                                
                                                    
                                                    <td class="text-center">
                                                        {{-- @can('cita.destroy') --}}
                                                        
                                                            {{-- @method("delete")
                                                            @csrf  --}}
                                                            <a  title="descargar factura"  
                                                            href="{{ route('factura-pdf', $invoice->id) }}"
                                                            class="btn btn-outline-success btn-circle">
                                                                <i class="fa fa-download"></i>
                                                    </a>
                                                        {{-- </form> --}}
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                               
                                         @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('cart.invoices')}}" class="btn btn-outline-primary mx-3 mt-3 " >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{$invoices->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $invoices->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $invoices->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $invoices->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $invoices->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                 
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('cart.invoices')}}" class="btn btn-outline-primary" >regresar</a>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 mt-4">
                                    <div class="form-group">
                                        
                                            <strong class ="card-title">¡No hay nota de pagos!</strong>
                                       
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
