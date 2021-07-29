
@extends('layouts.main')
@section('titulo', 'Bienvenido')
@section('contenido')
@guest
{{-- incluye vista inicio--}}
<div id="wrapper">
    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column  bg-color">

        <!-- Main Content -->
        <div id="content">
        @include('layouts.nav-log')
           

                <!-- Begin Page Content -->
                <div class="container rounded color mt-5 px-5 p-5">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">PAGINA NO ENCONTRADA </p>
                        <p class="message-error404">Parece que encontraste un error <i class="fas fa-frown"></i></p>
                        <a  href="{{ url('/') }}">&larr; ¿Deseas regresar a la pagina principal? <i class="fas fa-smile-beam"></i></a>
                    
                    </div>
                    <br><br><br><br>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <br><br><br><br>
           
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

     <!-- Footer -->
     @include('plantilla.footer')
     <!-- End of Footer -->

@else 
{{-- parte del sistema  --}}


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
                <div class="container rounded color mt-5">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">PAGINA NO ENCONTRADA </p>
                        <p class="message-error404">Parece que encontraste un error <i class="fas fa-frown"></i></p>
                        <a  href="{{ url('/') }}">&larr; ¿Deseas regresar a la pagina principal? <i class="fas fa-smile-beam"></i></a>
                    <br><br>
                    </div>

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
 @endguest
@endsection
