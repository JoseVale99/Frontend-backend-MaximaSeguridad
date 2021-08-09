@extends('layouts.main')
@section('titulo', 'Catálogo')
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            @if(count(Cart::getContent()))
                            <a  class="nav-link text-light"
                             href="{{ route('cart.cart')}}" ><h4>Ir a catálogo <i class="fas fa-cart-plus"></i>  : 
                                <span class="badge badge-success"> {{ count(Cart::getContent()) }}</span> </h4></a>           
                       @else
                            <a class="nav-link text-light"
                            href="{{ route('cart.cart')}}" ><h4>Ver carrito <i class="fas fa-cart-plus"></i>  : 
                                <span class="badge badge-danger"> {{ count(Cart::getContent()) }}</span> </h4></a>           
                       @endif
                            </div>
                            <?php

                            $session = session('_token');
                            $sessiontostring =  strval($session);
                            //echo "$sessiontostring";
                            
                                 ?>

                        <div class="card shadow  rounded card-color">
                            
                        </div>
                        @if (count(Cart::getContent()))
                           

                                <div class="card-body ">
                                    <div class="table-responsive">
                                        {{-- id="dataTable" --}}
                                        <table class="table  table-light" width="100%" cellspacing="0">
                                            <thead class="bg-color ">
                                                <tr class="text-blank text-center">
                                                    {{-- <th scope="col">NO</th> --}}
                                                    <th scope="col">NO</th>
                                                    <th scope="col">PRODUCTO</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">NOMBRE</td>
                                                    <th scope="col">PRECIO</th>
                                                    <th scope="col">CANTIDAD</th>
                                                    <th scope="col">ACCIÓN</th>
                                                    
                                                    {{-- <th scope="col">CANTIDAD</th> --}}
                                                    {{-- <th scope="col">ELIMINAR</th> --}}
                                                </tr>
                                            </thead>
                                            
                                            {{-- {{Cart::getContent()}} --}}
                                            <tbody class="text-black2">
                                               
                                        
                                                    
                                                <?php
                                                {{  $i = 1;}} //contador para el listado de objetos en el carrito
                                            ?>

                                               @foreach (Cart::getContent() as $item)
                                               <?php

                                               $cadenafoto = $item->attributes;
                                         $elimina = array("\"", "{","[","]", "}","imagen:",'/');
                                         
                                               $urlfoto = str_replace($elimina,"" ,$cadenafoto)
                                         
                                               //Esto que ven aqui es para poder sacar la foto de los atributos del carrito y me estorbaban esos caracteres
                                               ?>

                                                
                                               <tr class="table-hover">
                                                <td class="text-center">{{ $i }}</td>
                                                <td>
                                                    <div class="text-center">
                                                    <img src="{{$urlfoto}}" class="image-responsive img-thumbnail rounded"  
                                                    width="20%" alt="camaras de seguridad">
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $item->id }}</td>
                                                <td class="text-center">{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->price }}</td>
                                                <td class="text-center">{{ $item->quantity}}</td>

                                                <td class="text-center">
                                                    <form action="{{ route('cart.removeitem')}}"
                                                    method="POST">
                                                    @csrf 
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button title="eliminar producto" type="submit" class="btn btn-outline-danger btn-circle">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                </td>
                                                   
                                                   }
                                            </tr>

                                            <?php

                                                $i++;
                                                ?>
                                               @endforeach
                                               
                                               <td>
                                                <form action="{{ route('cart.clear') }}" method="POST">
                                                      @csrf
                                                      <td class="text-center">
                                                        <input title="limpiar todo el carrito" class="btn btn-outline-danger btn-lg btn-block" type="submit" name="Limpiar" value="Limpiar Carrito">
                                                </form>
                                               </td>
                                               <td></td>
                                               <td class="text-right"> TOTAL: {{ Cart::getTotal() }}  MXN</td>
                                                <td class="text-right">SUBTOTAL:  {{ Cart::getSubTotal()*.9 }} MXN</td>
                                               
                                               

                                               
                            
                                               
                                            </tbody>
                                            
                                        </table>
                                        @if (count(Cart::getContent())!=0)
                                       

                                            <a title="realizar compra" href="{{ route('cart.stripe')}}"class="btn btn-outline-success btn-lg btn-block ">
                                                 comprar <i class="fas fa-cart-arrow-down"></i>
                                            </a>
                                        @endif
   
                                    </div>
                            </div>
                        
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('cart.cart')}}" class="btn btn-outline-primary" >regresar</a>
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

