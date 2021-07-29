<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Nota de pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 ">
                <h1>Nota de pago</h1>
            </div>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-10">
                <h1 class="h6">Ernesto Jiménez Velázquez</h1>
                <h1 class="h6">Sistemas de Máxima Seguridad</h1>
            </div>
            <div class="col-xs-2 text-center">
              
                <br>
                
                {{-- <td>{{date('l', time())}}</td><br> --}}
          
               
            </div>
        </div>
        <hr>
        <div class="row text-center" style="margin-bottom: 2rem;">
            <div class="col-xs-6">
                
            </div>
            <div class="col-xs-6">
                <h1 class="h2"> Nota de Pago</h1>
                {{-- @foreach ($invoices as $invoice)
                <strong>{{$invoice->nombre}}</strong>
                @endforeach --}}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-condensed table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>DESCRIPCIÓN / CANTIDAD</th>
                            <th>DIRECCIÓN</th>
                            <th>TELÉFONO</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody><tfoot>
                        @foreach ($invoices as $invoice)
                        <tr class="table-bordered">
                            
                        <td  class="text-left">{{ $invoice->productos }}</td>
                           <td  class="text-left">{{ $invoice->direccion }}</td>
                           <td>{{ $invoice->telefono }}</td>
                            <td  class="text-left">{{$invoice->total_venta }} MXN</td>
                            
                           
                           
                            </tr>
                           
                            <tr>
                                <td colspan="3" class="text-right">
                                  <h5>Cliente</h5>
                              </td>   
                                <td  class="text-right">
                                  {{$invoice->nombre }}
                              </td>
                          
                          </tr>
                          <tr>
                            <td colspan="3" class="text-right">
                              <h5>Fecha</h5>
                          </td>   
                            <td  class="text-right">
                              {{$invoice->fecha }}
                          </td>
                      
                      </tr>
                             <tr>
                                <td colspan="3" class="text-right">
                                  <h5>TOTAL</h5>
                              </td> 
                             <td  class="text-right">
                                      <h5> $ {{$invoice->total_venta }} MXN</h5>
                                  </td>
                              </tr>
                              

                            </tfoot>
                       
                       
                 @endforeach
                </tbody>
            
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="h4">¡Gracias por su compra!</p>
            </div>
        </div>
    </div>
</body>

</html>