<title>Home</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard </h3>
        </div>
        <div class="section-body">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!---Cards---->


<div class="container">
    <div id="contenedor">
        <div id="caja">
            <label id="hora"></label>
        </div>
        <div id="caja2">
            <label id="minuto"></label>
        </div>
        <div id="caja3">
            <label id="segundo"></label>
        </div>
    </div>
</div>

                        </div>
                        <div class="titulo">Resumen</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Total de Vehiculos</h5>
                                            @php
                                                use App\Models\VehiculoModel;
                                                $cant_vehiculos = VehiculoModel::count();
                                            @endphp
                                            <h2 class="text-right"> <i class=" fas fa-car-side f-left"></i>
                                                <span>{{ $cant_vehiculos }}</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Conductores</h5>
                                            @php
                                                use App\Models\Conductor;
                                                $cant_conductores = Conductor::count();
                                            @endphp
                                            <h2 class="text-right"> <i
                                                    class="fas fa-user f-left"></i><span>{{ $cant_conductores }}</span></h2>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Mecánicos</h5>
                                            @php
                                                use App\Models\Mecanico;
                                                $cant_mecanicos = Mecanico::count();
                                            @endphp
                                            <h2 class="text-right"> <i
                                                    class="fas fa-hard-hat f-left"></i><span>{{ $cant_mecanicos }}</span>
                                            </h2>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Incidentes</h5>
                                            @php
                                                use App\Models\Incidente;
                                                $cant_users = Incidente::count();
                                            @endphp
                                            <h2 class="text-right"> <i
                                                    class="fas fa-car-crash f-left"></i></i><span>{{ $cant_users }}</span>
                                            </h2>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Gastos Totales</h5>
                                            <h2 class="text-right"> <i class="fas fa-dollar-sign  f-left  "></i><span>{{ $total }} MXN</span>
                                            </h2>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Proveedores</h5>
                                            @php
                                                use App\Models\Proveedor;
                                                $proveedores = Proveedor::count();
                                            @endphp
                                            <h2 class="text-right"> <i class="fa fa-address-book f-left" aria-hidden="true"></i><span>{{ $proveedores }}</span>
                                            </h2>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>



                            <div class="titulo">
                                Agenda  <a class="btn btn-primary btn-colapsar " data-bs-toggle="collapse" href="#eventos" role="button" aria-expanded="true" aria-controls="collapseExample">
                                      <i class="fas fa-plus"></i> 
                                         </a>
                              </div>

                                <div class="card collapsing" id="eventos">
                                    
                                    <div class="card-body">
                                        @include('Calendario.index')
                                    </div>
                                </div>
                               


                



                     
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        window.addEventListener('load', () => {
            let horaHTML = document.getElementById('hora')
            let minutoHTML = document.getElementById('minuto')
            let segundoHTML = document.getElementById('segundo')

            function mostrarHora() {
                let fecha = new Date();
                let hora = fecha.getHours();
                let minuto = fecha.getMinutes();
                let segundo = fecha.getSeconds();

                horaHTML.textContent = String(hora).padStart(2, "0");
                minutoHTML.textContent = String(minuto).padStart(2, "0");
                segundoHTML.textContent = String(segundo).padStart(2, "0");

                setTimeout(mostrarHora, 1000);



            }
            mostrarHora();
        });
    </script>
<script>
    $('.collapsing').on('shown.bs.collapse', function(){
$(this).parent().find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
});
</script>

@endsection
