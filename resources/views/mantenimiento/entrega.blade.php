<title>Entrega</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Terminar Mantenimiento</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="titulo">{{ $mantenimiento->VehiculosM->NombreVehiculo }}</div>
                           

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
                            <form action="{{ route('mantenimiento.alta', $mantenimiento->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')
                                <input type="text" name="vehiculo" value="{{$mantenimiento->vehiculo}}"readonly hidden>
                                <div class="row">
                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Fecha de Termino</label><span class="text-danger">*</span>
                                        <input type="date" name="fecha_alta" class="form-control" value="<?php echo date('Y-m-d');?>">
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-xs-6">
                                        <label>Comentarios</label><span class="text-danger">*</span>
                                        <input type="text" name="comentario_e" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-2 col-xs-2">
                                        <label>Hora de Alta</label>
                                        <input type="time" class="form-control" name="hora_alta"  value="now"  readonly >
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                    <a class="btn btn-danger mt-3" href="{{ route('servicios.index') }}">Regresar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
