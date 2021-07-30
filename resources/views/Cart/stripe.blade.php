@extends('layouts.main')
@section('titulo', 'Pago')
@section('contenido')

    <!-- Page Wrapper -->
    <div id="wrapper">
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
                    <h1 class="h3 mb-2 bold-title"> Pago <i class="fab fa-cc-stripe"></i></h1>
                    <p class="mb-4 text-dark">Realize su pago aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            DETALLES DEL PAGO <i class="fas fa-cart-arrow-down"></i>
                        </div>


                        

                        <div class="container">
                           
                      
                        <form  action="{{route('stripe.post')}}"  data-cc-on-file="false" data-stripe-publishable-key="pk_test_iS5sLGz5CONWxJ8KHhBzHHvD" name="frmStripe" id="frmstripe" method="post">
                            {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                    <div class="form-group text-center">
                                        <img class="image-auto" width="50%" 
                                        src="https://i.ibb.co/7gw3J50/924015-1-1.png" 
                                         
                                        alt="">
                                    </div>
                                       
                                </div>
                                    <div class="col-md-4 mt-4">
                                        <div class="form-group required">
                                            <label class="text-black h4">Nombre del titular</label>
                                            <input class='form-control text-upper' size='4' placeholder="Nombre" type='text' name="nombre"  value="{{ old('nombre')}}">
                                            @error('nombre')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Número de tarjeta</label>
                                            <input autocomplete='off' placeholder="Número de tarjeta" class='form-control' size='20' name="card_no" 
                                            value="{{ old('card_no')}}"
                                            type='text'>

                                            @error('card_no')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror

                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">CVC</label>
                                            <input autocomplete='off' class='form-control' name="cvv" placeholder='e.g 415'
                                                size='4' type='password' value="{{old('cvv')}}" >
                                            
                                            @error('cvv')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        
                                            </div>
                                    </div>

                                <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Teléfono</label>
                                            <input type="text" name="telefono"
                                                placeholder="teléfono"
                                                class="form-control text-upper"
                                                value="{{old('telefono')}}">
                                        
                                             
                                              @error('telefono')
                                              <div class="message-error">*{{ $message }}</div>
                                          @enderror
                                        
                                            </div>

                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Dirección</label>
                                            <textarea name="direccion"
                                                placeholder="dirección de destino del servicio"
                                                class="form-control text-upper">{{old('direccion')}}</textarea> 
                                            
                                                  
                                            @error('direccion')
                                            <div class="message-error">*{{ $message }}</div>
                                        @enderror
                                        
                                            </div>

                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Mes de vencimiento</label>
                                            
                                                @php($meses = ["1","2","3","4",
                                                '5','6', '7', '8' ,'9', '10', '11', '12',
                                                ])
                                                    <select class="form-control text-upper" name="expiry_month" autocomplete="off">
                                                        <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                        @foreach ($meses as $mes)
    
                                                            @if (old('expiry_month') == $mes)
                                                                <option class="text-upper" selected="selected">{{ $mes }}</option>
                                                            @else
                                                                <option>{{ $mes }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    {{-- validaciones --}}
                                                    @error('expiry_month')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
    
                                                </div>
                                            </div>
                                        

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Año de vencimiento</label>
                                            @php($anios = ["2021","2022","2023","2024",
                                            '2025','2026', '2027', '2028' ,'2029', '2030', 
                                            '2031', '2032',
                                            ])
                                                <select class="form-control text-upper" name="expiry_year" autocomplete="off">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($anios as $anio)

                                                        @if (old('expiry_year') == $anio)
                                                            <option class="text-upper" selected="selected">{{ $anio }}</option>
                                                        @else
                                                            <option>{{ $anio }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                {{-- validaciones --}}
                                                @error('expiry_year')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                </div>
                                     {{-- PARTE BOTONES --}}

                                     <div class="row justify-content-center mt-4">
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary btn-ms" title="pagar" >
                                                    Pagar $ {{ Cart::getSubTotal()*.9 }} MXN </i></button>
                                        </div>
                                       
                                        
                                            <div class="col-auto">
                                                <a title="cancelar compra"  href={{ route('cart.checkout') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
                                            </div>
                                       
                                    </div>

                                </form>
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
