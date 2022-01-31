<title>Reporte de Incidentes</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reporte de Incidentes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
<div class="titulo">
    Registro
</div>
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

                            <form action="{{ route('incidentes.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Vehiculo</label>
                                    <input type="text" class="form-control" name="vehiculo">
                                </div> --}}

                                    <div class="col-md-3 col-xs-3 col-xs-3">
                                        <label>Vehiculo</label><span class="text-danger">*</span>
                                        <select name="vehiculo" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($vehiculos as $vehiculo)
                                                <option value="{{ $vehiculo['id'] }}">{{ $vehiculo['NombreVehiculo'] }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-xs-3">
                                        <label>Conductor</label><span class="text-danger">*</span>
                                        <select name="conductor" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($conductores as $conductor)
                                                <option value="{{ $conductor['id'] }}">{{ $conductor['NombreConductor'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-3 col-xs-3 col-xs-3">
                                        <label>Fecha de Reporte</label>
                                        <input type="date" class="form-control" name="Fecha_reporte" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-xs-3">
                                        <label>Descripcion Corta</label>
                                        <input type="text" class="form-control" name="descripcion"
                                            placeholder="Ejem. Luz rota" value="{{old('descripcion')}}">
                                    </div>
                                    <div class="col-md-3 col-xs-3 col-xs-3">
                                        <label>Importancia</label><span class="text-danger">*</span>
                                        <select name="importancia" class="form-control">
                                            <option value="">-</option>
                                            <option>Alta</option>
                                            <option>Media</option>
                                            <option>Baja</option>
                                        </select>
                                    </div>

                                    <div class="col-md-9 col-xs-9 col-xs-9">
                                        <label>Descripcion Detallada</label>
                                        <textarea rows="1" cols="3" class="form-control" name="detallada"></textarea>
                                    </div>
                                    <div class="col-md-12 col-xs-12 col-xs-12">
                                        <label>Foto: </label>
                                        <input class="form-control imagenes" type="file" name='foto'>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                                <a href="{{ route('incidentes.index') }}" class="btn btn-danger mt-2">Cancelar</a>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
