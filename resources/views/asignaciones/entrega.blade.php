<title>Devolucion | {{ $asignaciones->id }}</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Retorno Vehiculo</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('alert-danger'))
                                <div class="alert alert-danger">
                                    {{ session()->get('alert-danger') }}
                                </div>
                            @endif
                            <div class="titulo">{{ $asignaciones->vehiculos->NombreVehiculo }}</div>
                            <div class="row row-cols-lg-2">
                                <div class="col">
                                    <div class="card">
                                        <img src="/imagen/{{ $asignaciones->vehiculos->imagen }}" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-left">Conductor asignado:</th>
                                                    <td class="text-right">
                                                        <strong>{{ $asignaciones->conductores->NombreConductor }}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Fecha de Asignación:</th>
                                                    <td class="text-right">
                                                        <strong>{{ $asignaciones->fecha_a }}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Odometro Al Asignar:</th>
                                                    <td class="text-right"><strong>{{ $asignaciones->odometro_a }}
                                                            Km</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-left">Combustible al asignar:</th>
                                                    <td class="text-right"><strong>{{ $asignaciones->combustible_a }}
                                                            Lts</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="titulo">Datos de entrega</div>
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos! </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span> </button>
                                </div>
                            @endif
                            <form action="{{ route('asignacion.devolucion', $asignaciones->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="text" class="form-control" name="combustible_a"
                                        value="{{ $asignaciones->combustible_a }}" hidden readonly>
                                    <input type="text" class="form-control" name="conductor"
                                        value="{{ $asignaciones->conductor }}" hidden readonly>
                                    <input type="text" class="form-control" value="{{ $asignaciones->vehiculo }}"
                                        name="vehiculo" hidden readonly>
                                    <input type="text" class="form-control" value="{{ $asignaciones->odometro_a }}"
                                        name="odometro_a" hidden readonly>

                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Fecha de entrega</label><span class="text-danger">*</span>
                                        <input type="date" class="form-control" name="fecha_e" min="2020-11-11"
                                            value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Odometro Final</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="odometro_e" min="0" step="any">
                                            <span class="input-group-text icon-beauty">Km</span>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Combustible Final</label><span class="text-danger">*</span>
                                        <div class="input-group">
                                            <input type="number" name="combustible_e" min="0" class="form-control">
                                            <span class="input-group-text icon-beauty">Lts</span>
                                        </div>
                                       
                                    </div>


                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                    <a class="btn btn-danger mt-3" href="{{ route('asignaciones.index') }}">Regresar</a>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script type="text/javascript">
    function myFunction() {
        var x, y, suma, text;
        x = document.getElementById("qty").value;
        y = document.getElementById("qty2").value;
        if (isNaN(x) || isNaN(y)) {
            text = "Es necesarios introducir dos números válidos";
        } else {
            //si no ponemos parseFloat concatenaría x con y  
            suma = parseFloat(x) + parseFloat(y);
            text = suma;
        }
        document.getElementById("total").value = text;
    }
</script>
