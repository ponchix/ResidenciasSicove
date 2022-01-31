<title>Carga Combustible</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva carga de combustible</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('combustible-carga.index') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fa fa-chevron-left" aria-hidden="true"></i> Atrás</a>
                            <div class="titulo">información de referencia</div>
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
                            <form action="{{ route('combustible-carga.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <input type="text" name="vehiculo" value="{{ $vehiculo->id }}"
                                class="form-control" hidden readonly>
                                @foreach ($carga as $item)
                                <input type="text" name="carga" value="{{ $item->combustible_a }}"
                                class="form-control" hidden readonly>                
                                @endforeach



                                <div class="container">
                                    <div class="row ">
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Fecha:</label><span class="text-danger">*</span>
                                            <input type="date" name="fecha_carga" class="form-control"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Hora:</label><span class="text-danger">*</span>
                                            <input type="time" name="hora_carga" class="form-control" value="now" readonly>
                                        </div>
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Referencia:</label><span class="text-danger">*</span>
                                            <input type="text" name="referencia_carga" class="form-control"
                                                placeholder="# de ticket,Factura,etc." onkeyup="mayus(this);"
                                                value="{{ old('referencia_carga') }}">
                                        </div>

                                        <div class="col-md-3 col-xs-3 col-xs-3 align-self-end">
                                            <label>Factura/Ticket:</label><span class="text-danger">*</span>
                                            <input type="file" name="imagen_combustible" class="form-control imagenes"
                                                value="{{ old('imagen_combustible') }}">
                                        </div>


                                    </div>
                                    <div class="row row-cols-lg-2 mt-1">
                                        <div class="col">
                                            <label>Proveedor:</label><span class="text-danger">*</span>
                                            <select name="proveedor" id="" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{ $proveedor['id'] }}">
                                                        {{ $proveedor['NombreProveedor'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Conductor:</label><span class="text-danger">*</span>
                                            <select name="conductor" id="" class="form-control">
                                                <option value="">-</option>
                                                @foreach ($conductores as $conductor)
                                                    <option value="{{ $conductor['id'] }}">
                                                        {{ $conductor['NombreConductor'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="titulo">Valores de carga</div>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3 col-xs-3 ">
                                            <label>Tipos de Combustible:</label><span class="text-danger">*</span>
                                            <select name="tipo_combustible" id="" class="form-control">
                                   <option value="">-</option>
                                   @foreach ($tipos as $tipo)
                                       <option value="{{$tipo['id']}}">{{$tipo['tipo_combustible']}}</option>
                                   @endforeach
                               </select>

                                        </div>
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Cantidad:</label><span class="text-danger">*</span>
                                            <div class="input-group">
                                                <input type="number" name="cantidad" class="form-control"
                                                onkeyup="mayus(this);" step="any" min="0" value="{{ old('cantidad') }}">
                                                <span class="input-group-text icon-beauty">Lts</span>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Costo unitario:</label><span class="text-danger">*</span>
                                            <div class="input-group">
                                                <span class="input-group-text icon-beauty">$</span>
                                                <input type="number" name="costo_uni" class="form-control"
                                                onkeyup="mayus(this);" step="any" min="0" value="{{ old('costo_uni') }}">
                                            </div>
                                           
                                        </div>
                                        <div class="col-md-3 col-xs-3 col-xs-3">
                                            <label>Odometro:</label><span class="text-danger">*</span>
                                            <div class="input-group">
                                                <input type="text" name="odometro" class="form-control"
                                                onkeyup="mayus(this);" value="{{$odometro}}" readonly>
                                                <span class="input-group-text icon-beauty">Km</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                        <a href="{{ route('vehiculos.index') }}"
                                            class="btn btn-danger ml-2 mt-3">Cancelar</a>
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
