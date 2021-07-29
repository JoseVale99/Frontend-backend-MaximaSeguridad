@extends('layouts.main')
@section('titulo', 'Bienvenido')
@section('contenido')
    @guest
        @include('layouts.nav-log')

        {{-- incluye vista inicio --}}
    <div class="bg-fondo">

   
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="1000">
                    <img src="https://cdn.pixabay.com/photo/2018/10/02/21/39/smart-3720021_960_720.jpg"
                        class="img-fluid d-block w-100" alt="">
                </div>


                <div class="carousel-item" data-bs-interval="1000">
                    <img src="https://cdn.pixabay.com/photo/2019/08/30/11/01/cctv-4440994_960_720.jpg"
                        class="img-fluid d-block w-100" alt="...">
                </div>


                <div class="carousel-item" data-bs-interval="1000">
                    <img src="https://cdn.pixabay.com/photo/2021/03/08/11/35/cctv-6078897_960_720.png"
                        class="img-fluid d-block w-100" alt="...">
                </div>


            </div>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--========================================================== -->
        <!-- INTRODUCCION DE SERVICIOS-->
        <!--========================================================== -->


        <section class="d-flex flex-column justify-content-center align-items-center pt-5  text-center w-50 m-auto" id="intro">
            <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> "Nuestro Compromiso Es Mantenerte A
                    Salvo"</span></h1>
            <p class="p-3  fs-4">
                <span class="text-success">Sistemas de Máxima Seguridad.</span> Esta es una empresa de servicios de seguridad
                que forma parte Vanguardia Empresarial de Seguridad Privada, enfocándose a la proporción de servicios de
                vigilancia y protección de bienes.
            </p>
        </section>

        <!--========================================================== -->
        <!-- TIPOS DE SERVICIOS-->
        <!--========================================================== -->


        <section>

            <div class="container">
                <div class="row">
                    <div class="col-sm">

                        <div class="text-center">
                            <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/1069/1069102.png"
                                alt="desarrollo" width="180" height="160">

                            <div>
                                <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Venta de Cámaras</h3>
                                <p class="px-4">¡Adquiere tus productos al mejor precio!.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm">
                      <div class="text-center">
                        <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/1497/1497835.png"
                            alt="desarrollo" width="180" height="160">

                        <div>
                            <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Agenda tu cita</h3>
                            <p class="px-4">Agenda tu cita, dudas o reparación de equipos siempre estamos disppnible para ti.</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm">
                      <div class="col-sm">
                        <div class="text-center">
                          <img class="img-responsive" src="https://image.flaticon.com/icons/png/512/1086/1086741.png"
                              alt="desarrollo" width="180" height="160">
  
                          <div>
                              <h3 class="fs-5 mt-4 px-4 pb-1 text-success">Pagos por Stripe</h3>
                              <p class="px-4">Tus pagos son rápidos y seguros.</p>
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="d-flex flex-column justify-content-center align-items-center pt-5  text-center w-50 m-auto" id="intro">
          <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> Misión</span>
          <img class="img-responsive"  width="7%" src="https://image.flaticon.com/icons/png/512/3233/3233474.png" alt="">
          </h1>
          <p class="p-3  fs-4">
              <span class="text-success">Misión.</span> 
              Proteger y cuidar lo más valioso de nuestros clientes con tecnología
               de punta y personal mejor calificado en todo lo que a seguridad se refiera.
          </p>

        <h1 class="p-3 fs-2 border-top border-3"> <span class="text-success"> Visión</span>
        <img class="img-responsive"  width="8%" src="https://image.flaticon.com/icons/png/512/2867/2867280.png" alt="">
        </h1>
        <p class="p-3  fs-4">
            <span class="text-success">Visión.</span> 
            Ser la empresa de seguridad privada más reconocida a nivel 
            nacional y brindaruna calidad total en cada uno de nuestros trabajos.
        </p>
    </section>
    



<!--========================================================== -->
                        <!-- SECCION CONTACTOS-->
<!--========================================================== -->

<section id="seccion-contacto" class="border-bottom border-secondary border-2">
  <div id="bg-contactos">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1b2a4e" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
  </div>


</section>

<!--========================================================== -->
                        <!--FOOTER-->
<!--========================================================== -->

</div>
<footer class="w-100  d-flex  align-items-center justify-content-center flex-wrap">
  <p class="fs-10 px-3  pt-3 text-dark1">Sistemas de Máxima Seguridad. &copy; Todos Los Derechos Reservados 2021</p>
  <div>
      <a href="https://es-la.facebook.com/pages/category/Home-Security-Company/sistemas-de-maxima-seguridad-199176066820952/"><i class="fab text-primary fa-facebook fa-2x	mx-2"></i></a>
      <a href="#"><i class="fab text-primary fa-twitter fa-2x mx-2	"></i></a>
      <a href="#"><i class="fab text-primary fa-instagram fa-2x	mx-2"></i></a>  
  </div>
  
</footer>

    @else
        {{-- parte del sistema --}}


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
                        <h1 class="h3 mb-2 bold-title">SISTEMAS DE MÁXIMA SEGURIDAD <i class="fas fa-shield-alt"></i> </h1>
                        <p class="mb-4 text-dark">¡Nuestro compromiso es mantenerte a salvo!</p>




                        <!-- DataTales Example -->
                        <div class="card shadow mb-4 rounded card-color">
                            <div class="card-header py-3 bg-color">
                                <h3 class="font-weight-bold  text-center"> ¡Bienvenido, {{ Auth::user()->name }}! <i
                                        class="fas fa-user"></i></h3>
                            </div>


                            <div class="card shadow  rounded card-color">
                                <div class="container text-black2 text-center">
                                    <br>
                                    Sea usted bienvenido a "Sistemas de Máxima Seguridad",
                                    esperemos que disfrute de su estancia, Gracias.
                                    <br>
                                    <br>


                                </div>
                                {{-- end container --}}
                            </div>


                        </div>
                        <br> <br> <br> <br> <br> <br> <br> <br>
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
