<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>  @yield('titulo','main')  </title>
    <link rel="shortcut icon" href="https://i.ibb.co/b6RqSDY/Logo-removebg-preview.png">

    <!-- Custom fonts for this template-->
    <link href="{{secure_asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{secure_asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    
    <link 
    href="{!! secure_asset('vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="{!! secure_asset('css/main.css') !!}">

</head>

<body id="page-top">

    @yield('contenido') 
          <!-- Bootstrap core JavaScript-->
          <script src="{{ secure_asset('vendor/jquery/jquery.min.js') }}"></script>
          <script src="{{ secure_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
             
          <!-- Core plugin JavaScript-->
          <script src="{{ secure_asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
             
          <!-- Custom scripts for all pages-->
          <script src="{{ secure_asset('js/sb-admin-2.min.js') }}"></script>

          <!-- Page level plugins -->
          <script src="{{ secure_asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
          <script src="{{ secure_asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
       
          <!-- Page level custom scripts -->
          <script src="{{ secure_asset('js/demo/datatables-demo.js') }}"></script>
          <script src="{{ secure_asset('js/main.js') }}"></script> 

      
   


    <!-- Page level plugins -->
    <script src="{{ secure_asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ secure_asset('js/demo/chart-area-demo.js') }}"></script>
   
</body>

</html>