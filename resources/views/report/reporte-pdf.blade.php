<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 ">
                <h1>Reporte de venta</h1>
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
            </div>
        </div>
        <hr>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            
            <th class="text-center" scope="col">Fecha</th>
            <th class="text-center" scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reportes as $report)
          <tr>
            <td class="text-center">{{$report->fecha}}</td>
            <td class="text-center">{{$report->total }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>