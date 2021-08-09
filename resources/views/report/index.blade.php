@extends('layouts.main')
@section('titulo', 'Reportes')
@section('contenido')

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- incluimos sildebar color: azul :) --}}
        @include('plantilla.sidebar')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"> </script>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.nav-log')

                <!-- Begin Page Content -->
                <div class="container-fluid rounded color">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 pt-5">
                        <h1 class="h3 bold-title text-upper">Dashboard Ventas <i class="fas fa-fw fa-tachometer-alt"></i></h1>
                        <a href="{{route('reporte-pdf')}}" class="btn btn-sm btn-primary shadow-sm"
                            title="descargar reporte"><i class="fas fa-download fa-sm text-white-50 rounded"></i> Generar
                            Reporte</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row justify-content-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                GANANCIAS (MENSUALES)</div>
                                                @if (count($total_mes)>0)
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$total_mes[0]->total}}</div>
                                                @else
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ 0</div>
                                                @endif
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                GANANCIAS (ANUALES)</div>
                                            @if (count($total_anio)>0)
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$total_anio[0]->total}}</div>
                                                @else
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ 0</div>
                                                @endif
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col justify-content-center">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Dashboard Ventas</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row-responsive">

                                        <canvas class="chart-area" id="myChart"></canvas>

                                    </div>
                                    {{-- <br><br><br><br><br><br><br> --}}

                                </div>
                            </div>
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

        <script>
            var dias = <?php echo $dias; ?>;
            var total = <?php echo $total; ?>;
           
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dias,
                    
                    datasets: [{
                        label: ' • Ingresos por días',
                        data: total,
                        backgroundColor: [
                            'rgb(57,101, 202)',
                            '#299BC2',
                             "#F16F1B",
                             "#DE0909",
                            '#208A73',
                            "#E29A1C",
                            "#7C8081"
                        ],
                        borderColor: [
                            'rgba(255, 255, 255, 255)'  
                        ],
                        borderWidth: 2
                    }]
                    
                     
                    
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                           
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>



    @endsection
