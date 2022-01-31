<title>Vehiculo | {{ $vehiculo->NombreVehiculo }}</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Información del Vehículo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fas fa-angle-left"></i>Atrás</a>
                            <div class="perfiles">
                                <div class="titulo">{{ $vehiculo->NombreVehiculo }}</div>
                                <img src="/imagen/{{ $vehiculo->imagen }}" width="65%" height="65%">
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <div class="titulo">Información Basica</div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-left">Nombre</th>
                                                <td class="text-right">{{ $vehiculo->NombreVehiculo }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Marca</th>
                                                <td class="text-right"> {{ $vehiculo->marcasVehiculo->marca }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Modelo</th>
                                                @foreach ($modelo as $item)
                                                    <td class="text-right">{{ $item->modelo }}</td>
                                                @endforeach

                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Año</th>
                                                <td class="text-right">{{ $vehiculo->anio }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <div class="titulo">Configuración</div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-left">Tipo de Vehiculo</th></small>
                                                <td class="text-right">{{ $vehiculo->tiposVehiculo->Nombre }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Estatus</th>
                                                <td class="text-right">
                                                    {{ $vehiculo->estadoVehiculo->status }}
                                                    @if ($vehiculo->estadoVehiculo->status == 'DISPONIBLE')
                                                        <span
                                                            class="badge bg-primary">{{ $vehiculo->estadoVehiculo->status }}</span>
                                                    @elseif($vehiculo->estadoVehiculo->status == 'TALLER')
                                                        <span
                                                            class="badge bg-warning">{{ $vehiculo->estadoVehiculo->status }}</span>
                                                    @elseif($vehiculo->estadoVehiculo->status == 'ASIGNADO')
                                                        <span
                                                            class="badge bg-info">{{ $vehiculo->estadoVehiculo->status }}</span>
                                                    @elseif($vehiculo->estadoVehiculo->status == 'FUERA DE SERVICIO')
                                                        <span
                                                            class="badge bg-danger">{{ $vehiculo->estadoVehiculo->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Medida</th>
                                                <td class="text-right">{{ $vehiculo->MedidaUso }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Tipo de Combustible</th>
                                                <td class="text-right">{{ $vehiculo->combustible }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Medida de Combustible</th>
                                                <td class="text-right">{{ $vehiculo->MedidaCombustible }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Motor</th>
                                                <td class="text-right">{{ $vehiculo->motor }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Disposición de Cilindros</th>
                                                <td class="text-right">{{ $vehiculo->cilindraje }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Numero de Cilindros</th>
                                                <td class="text-right">{{ $vehiculo->cilindrada }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <div class="titulo">Información Adicional</div>
                                    <table class="table" width="400">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Placas</th>
                                                <td class="text-right">{{ $vehiculo->Placa }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Color</th>
                                                <td class="text-right">{{ $vehiculo->Color }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">No. Serie</th>
                                                <td class="text-right">{{ $vehiculo->NoSerie }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Seguro</th>
                                                <td class="text-right"> {{ $vehiculo->CompaniaSeguros }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Poliza de seguro</th>
                                                <td class="text-right">{{ $vehiculo->PolizaSeguro }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">Vigencia de Poliza</th>
                                                <td class="text-right">{{ $vehiculo->fecha_poliza }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="titulo">Documentación</div>
                                    <a href="/factura/{{ $vehiculo->factura }}" class="btn btn-success"><i
                                            class="fas fa-file-alt"></i> Ver factura</a>
                                </div>
                                <div class="col-md-12 col-xs-12 col-xs-12">
                                    <div class="titulo">Combustible</div>
                                    <div id="combustible">

                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12 col-xs-12">
                                    <div class="titulo">Incidentes</div>
                                    <div id="incidentes">

                                    </div>
                                </div>

                                <div class="titulo">Gastos y Servicios</div>
                                <div class="col-md1-6 col-xl-6 col-xs-6">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Gastos Adicionales del Vehiculo</h5>
                                            <h2 class="text-right">
                                                <i class="fas fa-dollar-sign    "></i><span>{{ $gastos }}</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md1-6 col-xl-6 col-xs-6">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Costo Total</h5>
                                            <h2 class="text-right"> <i
                                                    class="fas fa-dollar-sign f-left"></i><span>{{ $mantenimientos }}
                                                    MXN</span>
                                            </h2>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    @include('vehiculos.DatatablePerfil')
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var datas = <?php echo json_encode($datas); ?>;

        Highcharts.setOptions({
            colors: ['#E14330']
        });

        const chart = Highcharts.chart('incidentes', {
            chart: {
                renderTo: 'container',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Total de Incidentes'
            },
            plotOptions: {
                column: {
                    depth: 25
                },
                series: {
                    allowPointSelect: true
                },
                area: {
                    depth: 100
                }
            },
            xAxis: {
                categories: [
                    'Total'
                ]

            },
            yAxis: {
                title: {
                    text: 'Incidentes Registrados'
                }

            },
            series: [{
                name: 'Incidentes',
                data: datas

            }]
        });
    });
</script>
//Grafica Combustible
<script>
</script>
