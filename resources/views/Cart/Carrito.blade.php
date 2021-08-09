@extends('layouts.main')
@section('titulo', 'Catalogo')
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
                    <h1 class="h3 mb-2 bold-title text-upper"> Catálogo <i class="fas fa-store"></i></h1>
                    <p class="mb-4 text-dark">Consulte sus productos aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')
                    <form action="{{ route('cart.cart', [$productos]) }}" method="GET">
                        @csrf 
                    </form>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="font-weight-bold ">

                                @if(count(Cart::getContent()))
                                <a class="nav-link text-light" 
                                href="{{ route('cart.checkout')}}" ><h4>Ver carrito <i class="fas fa-cart-plus"></i>  : 
                                    <span class="badge badge-success"> {{ count(Cart::getContent()) }}</span> </h4></a>        
                                @else
                                <a class="nav-link text-light" 
                                href="{{ route('cart.checkout')}}" ><h4>Ver carrito <i class="fas fa-cart-plus"></i>  : 
                                    <span class="badge badge-danger"> {{ count(Cart::getContent()) }}</span> </h4></a>        
                                @endif
                            </h6>
                        </div>

                        <?php

                        $session = session('_token');
                        $sessiontostring =  strval($session);
                        //echo "$sessiontostring";
                        
                             ?>
                        <div class="card shadow  rounded card-color">
                            
                            </div>
                            <div class="card-body ">
                              {{-- mostrar catalogo --}}
                              
                                <div class="row">
                                    @forelse ($productos as $producto)
                                    <div class="col-md mt-4 mx-2">
                                        <div class="card bg-light text-dark mb-3 rounded" 
                                        style="width: 17rem;">
                                            <img src="{{$producto->imagen}}" 
                                            class="img-responsive card-img rounded"
                                             width="200px" height="295px"
                                             alt="camaras de seguridad">
                                            <div class="card-body">
                                           
                                                
                                                <h2 class="card-title text-center  ">{{$producto->nombre}}</h2>
                                              <hr class="sidebar-divider bg-primary">
                                              <h4 class="text-center price">$ {{$producto->precio_v}}.00 MXN</h4>
                                              <hr class="sidebar-divider bg-primary">
                                              {{-- {{Cart::getContent()->quantity}} --}}
                                              @if ($producto->stock >0)
                                              <form  action="{{ route('cart.add') }}" method="POST">
                                              <p class="card-text  text-center stock">Existencia: {{$producto->stock}}</p>
                                              <hr class="sidebar-divider bg-primary">
                                              <p class="card-text  text-justify description">{{$producto->descripcion}}</p>
                                              
                                              <input type="number" value="{{old($producto->stock-$producto->stock+1)}}" max="{{$producto->stock}}" min="1" 
                                                placeholder="Cantidad" class="form-control text-upper text-center"
                                                id="cuantity" name="cantidad">
                                                <hr class="sidebar-divider">


                                                    
                                                   
                                                        @csrf
                                                      <input type="hidden" name="producto_id" 
                                                      value="{{$producto->id}}">
                                                      
                                                        <button  title="agregar al carrito" class="btn btn-outline-primary btn-lg btn-block"> Agregar <i class="fas fa-cart-plus"></i> 
                                                        </button>   
                                                     </form>
                                                    @else
                                                    <p class="card-text  text-center stock-danger">Existencia: {{$producto->stock}}</p>
                                                    <hr class="sidebar-divider bg-primary">
                                                    <p class="card-text  text-justify description">{{$producto->descripcion}}</p>
                                                    <button   class="btn btn-danger btn-lg btn-block" disabled> Agotado <i class="fas fa-frown"></i> 
                                                    </button>
                                                    
                                                     @endif

                                             
                                              
                                             
                                             
                                            </div>
                                          </div>
                                        </div> 
                                    @empty
                                        
                                        

                                    @endforelse
                                </div>
                               
                                
                            
                                <nav aria-label="Page navigation example float-right">
                                    <ul class="pagination float-right">
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $productos->previousPageUrl() }}">Anterior</a></li>
                                        <li class="page-item"><a class="page-link" href="{{ $productos->url(1) }}">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="{{ $productos->url(2) }}">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="{{ $productos->url(3) }}">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $productos->nextPageUrl() }}">Siguiente</a></li>
                                    </ul>
                                </nav>
                            
                            
                            
                       
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
