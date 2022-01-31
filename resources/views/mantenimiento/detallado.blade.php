<title>Detalles | {{ $mantenimiento->vehiculosM->NombreVehiculo }}</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Detalle de Matenimiento</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('servicios.index') }}" class="btn btn-outline-primary btn-lg"> <i
                                    class="fas fa-angle-left"></i>Atrás</a>

                            <div class="titulo">{{ $mantenimiento->vehiculosM->NombreVehiculo }}</div>
                            <div class="row">
                                <div class="col-md-3 col-xs-4 col-xs-4">
                                    <img src="/mantenimiento/{{ $mantenimiento->imagen_man }}" width="80%" height="50%">
                                </div>
                                <div class="col-md-5 col-xs-4 col-xs-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-left">Vehiculo</th>
                                                    <td class="text-right">
                                                        {{ $mantenimiento->vehiculosM->NombreVehiculo }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Odometro</th>
                                                    <td class="text-right"> {{ $mantenimiento->odometro }}Km</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Fecha Inicio</th>
                                                    <td class="text-right"> {{ $mantenimiento->fecha_inicio }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Hora Entrada</th>
                                                    <td class="text-right"> {{ $mantenimiento->hora_entrada }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Tipo de Mantenimiento</th>
                                                    <td class="text-right">{{ $mantenimiento->tipo_man }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Proveedor</th>
                                                    <td class="text-right">
                                                        {{ $mantenimiento->proveedorM->NombreProveedor }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Comentarios</th>
                                                    <td class="text-right"> {{ $mantenimiento->comentario }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-left">Referencia</th>
                                                    <td class="text-right"> {{ $mantenimiento->referencia_man }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Costo partes</th>
                                                    <td class="text-right"> ${{ $mantenimiento->costo_partes }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Mano de obra</th>
                                                    <td class="text-right"> ${{ $mantenimiento->mano_obra }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left" style="color:#922B21 ;">Total
                                                    </th>
                                                    <td class="text-right" style="color:#922B21 ;">
                                                        ${{ $mantenimiento->total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <div class="col-md-12 col-xs-12 col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                                <th class="table-success">Servicio(s)</th>
                                                @foreach ($servicios as $servicio)
                                                <tr>
                                                        <td class="text-center">{{ $servicio->nombre }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
