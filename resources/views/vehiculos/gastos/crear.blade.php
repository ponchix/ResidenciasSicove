<title>Gastos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Gastos</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >

                        @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos! </strong>
                            @foreach($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>                    </button>
                            </div>
                            @endif
                            <div class="titulo"> Registro de Gasto</div>
                            <form action="{{route('gastos.store')}}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-xs-12">
                                        <label>Fecha</label><span class="text-danger">*</span>
                                        <input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Vehiculo</label><span class="text-danger">*</span>
                                        <select name="vehiculo" class="form-control" onkeyup="mayus(this);">
                                           <option value="">-</option>
                                           @foreach($vehiculos as $vehiculo)
                                           <option value="{{$vehiculo['id']}}">{{$vehiculo['NombreVehiculo']}}</option>
                                           @endforeach
           
                                       </select>
                                   </div>
                                   <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Conductor</label><span class="text-danger">*</span>
                                    <select name="conductor" class="form-control">
                                       <option value="">-</option>
                                       @foreach($conductores as $conductor)
                                       <option value="{{$conductor['id']}}">{{$conductor['NombreConductor']}}</option>
                                       @endforeach
       
                                   </select>
                               </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Concepto</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="concepto" onkeyup="mayus(this);" value="{{old('concepto')}}">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Referencia</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="referencia" onkeyup="mayus(this);" value="{{old('referencia')}}">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Monto</label><span class="text-danger">*</span>
                                    <div class="input-group">
                                        <span class="input-group-text icon-beauty">$</span>
                                        <input type="number" class="form-control" name="monto" step="any" value="{{old('monto')}}" min="0">
                                    </div>
                                   
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Proveedor</label><span class="text-danger">*</span>
                                    <select name="proveedor" class="form-control" onkeyup="mayus(this);" >
                                       <option value="">-</option>
                                       @foreach($proveedores as $proveedor)
                                       <option value="{{$proveedor['id']}}">{{$proveedor['NombreProveedor']}}</option>
                                       @endforeach
       
                                   </select>
                               </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                                <a href="{{route('gastos.index')}}" class="btn btn-danger mt-2">Cancelar</a>
                            </form>

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
<script type="text/javascript">
    function mayus(e) {
       e.value = e.value.toUpperCase();
   }
</script>