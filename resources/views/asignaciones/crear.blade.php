<title>Asignacion Nueva</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva Asignación</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
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
                            <div class="titulo">{{ $vehiculo->NombreVehiculo }}</div>
                            <form action="{{ route('asignaciones.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <input type="text" name="vehiculo" value="{{ $vehiculo->id }}" class="form-control"
                                    hidden readonly>
                                <div class="container">
                                    <div class="row row-cols-lg-2 g-2 g-lg-3">
                                        <div class="col">
                                            <div class="card">
                                                <img src="/imagen/{{ $vehiculo->imagen }}" class="img-fluid mt-4">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label>Conductor</label><span class="text-danger">*</span>
                                            <select name="conductor" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($conductores as $conductor)
                                                    <option value="{{ $conductor['id'] }}">
                                                        {{ $conductor->NombreConductor }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <label>Fecha de asignacion</label><span class="text-danger">*</span>
                                            <input type="date" class="form-control" name="fecha_a" min="2020-11-11"
                                                value="<?php echo date('Y-m-d'); ?>">

                                            <label>Odometro Actual</label><span class="text-danger">*</span>
                                            <div class="input-group">

                                                @if ($odometro == 0)
                                                    <input class="form-control" type="number" name="odometro_a" min="0"
                                                        step="any" value="{{ $odometro }}"
                                                        placeholder="Sin registro">
                                                @else
                                                    <input class="form-control" type="number" name="odometro_a" min="0"
                                                        step="any" value="{{ $odometro }}" readonly>
                                                @endif
                                                <span class="input-group-text icon-beauty">Km</span>
                                            </div>



                                            <label>Combustible Actual</label><span class="text-danger">*</span>
                                            <div class="input-group">
                                                @if ($combustible == '0')
                                                    <input type="number" name="combustible_a" min="0" class="form-control"
                                                        placeholder="combustible actual" value="0">
                                                @else
                                                    @foreach ($combustible as $fuel)
                                                        <input type="number" name="combustible_a" min="0"
                                                            class="form-control" placeholder="combustible actual"
                                                            value="{{ $fuel }}" readonly>
                                                    @endforeach
                                                @endif

                                                <span class="input-group-text icon-beauty">Lts</span>
                                            </div>

                                            <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                                            <a class="btn btn-danger mt-2"
                                                href="{{ route('vehiculos.index') }}">Regresar</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-6 col-xs-6 col-xs-6">

                                        </div>


                                        <div class="col-md-6 col-xs-6 col-xs-6">

                                        </div>

                                        <div class="col-md-6 col-xs-6 col-xs-6">



                                        </div>

                                        {{-- @if ($combustible->isEmpty()) --}}
                                        <div class="col-md-6 col-xs-6 col-xs-6">


                                        </div>
                                        {{-- @elseif($combustible->isNotEmpty()) --}}


                                        {{-- @endif --}}




                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                    </div>
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
