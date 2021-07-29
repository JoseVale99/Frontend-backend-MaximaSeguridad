@extends('plantilla.plantilla')
@section('titulo', 'Agendar cita')
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
                    <h1 class="h3 mb-2 bold-title"> AGENDAR CITA <i class="fas fa-calendar-check"></i></i> </h1>
                    <p class="mb-4 text-dark">Ingrese sus datos en el siguiente formulario.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">Agendar Cita</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        <div class="container">
                           
                            
                            <form action="{{route('cita.store') }}"  method="POST">
                                @csrf

                                <div class="row">

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre Completo</label>
                                            <input type="text" name="nombre"
                                                placeholder="Introduce tu nombre"
                                                class="form-control text-upper"
                                                value="{{old('nombre')}}">
                                              {{-- validaciones --}}
                                              @error('nombre')
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
                                        
                                              {{-- validaciones --}}
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
                                            
                                                  {{-- validaciones --}}
                                            @error('direccion')
                                            <div class="message-error">*{{ $message }}</div>
                                        @enderror
                                        
                                            </div>

                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Referencias</label>
                                            <textarea name="referencias"
                                                placeholder="Referencias de tu domicilio"
                                                class="form-control text-upper">{{old('referencias')}}</textarea>
                                        
                                              {{-- validaciones --}}
                                              @error('referencias')
                                              <div class="message-error">*{{ $message }}</div>
                                          @enderror
                                        
                                            </div>
                                    </div>

                                    
                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black">Entidad</label>
                                            {{-- @php($entidades = ['Aguascalientes',
                                            'Baja California',
                                            'Baja California Sur',
                                              'Campeche',
                                              'Chiapas',
                                              'Chihuahua',
                                              'Coahuila de Zaragoza',
                                              'Colima',
                                              'Ciudad de México',
                                              'Durango',
                                              'Guanajuato',
                                              'Guerrero',
                                              'Hidalgo',
                                              'Jalisco',
                                              'Estado de Mexico',
                                              'Michoacan de Ocampo',
                                              'Morelos',
                                              'Nayarit',
                                              'Nuevo Leon',
                                              'Oaxaca',
                                              'Puebla',
                                              'Queretaro de Arteaga',
                                              'Quintana Roo',
                                              'San Luis Potosi',
                                              'Sinaloa',
                                              'Sonora',
                                              'Tabasco',
                                              'Tamaulipas',
                                              'Tlaxcala',
                                              'Veracruz de Ignacio de la Llave',
                                              'Yucatan',
                                              'Zacatecas'])
                                                <select class="form-control text-upper" name="entidad">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($entidades as $enti)

                                                        @if (old('entidad') == $enti)
                                                            <option class="text-upper" selected="selected">{{ $enti }}</option>
                                                        @else
                                                            <option>{{ $enti }}</option>
                                                        @endif
                                                    @endforeach
                                                </select> --}}
                                                {{-- validaciones --}}
                                                <textarea name="entidad"
                                                placeholder="Entidad/Municipio"
                                                class="form-control text-upper">{{old('entidad')}}</textarea>
                                                
                                                
                                                @error('entidad')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>


                                   

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Tipo de Atención</label>
                                            @php($tipos = ['Servicio', 'Consulta', 'Mantenimiento'])
                                                <select class="form-control text-upper" name="tipo_atencion">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($tipos as $type)

                                                        @if (old('tipo_atencion') == $type)
                                                            <option selected="selected">{{ $type }}</option>
                                                        @else
                                                            <option>{{ $type }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                {{-- validaciones --}}
                                                @error('tipo_atencion')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Fecha</label>
                                            <input placeholder="Select date" type="date" name="fecha" class="form-control"
                                                 value="{{old('fecha')}}"
                                                min="2021-07-08" max="2025-12-31">
                                       
                                                @error('fecha')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                       
                                       
                                            </div>
                                    </div>

                                    <div class="col-md-8 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Descripción</label>
                                            <textarea class="form-control text-upper"
                                                placeholder="Descripción del problema..."
                                                name="descripcion">{{old('descripcion') }}</textarea>
                                        </div>
                                    
                                        @error('descripcion')
                                                    <div class="message-error">*{{ $message }}</div>
                                                @enderror
                                    
                                    </div>
                                </div>


                                       {{-- PARTE BOTONES --}}

                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <button title="enviar cita" type="submit" class="btn btn-primary btn-ms">
                                                    Enviar <i class="far fa-paper-plane"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <a  title="cancelar cita" href={{ url('/') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
                                            </div>
                                        </div>


                                    </form>
                                   
                                    </div>

                            <!-- </div> -->
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
