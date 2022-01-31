<title>Editar {{$gastos->id}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Gasto {{$gastos->id}}</h3>
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
                            <form action="{{route('gastos.update',$gastos->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-xs-12">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="fecha" value="{{$gastos->fecha}}">
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-xs-4">
                                        <label>Vehiculo</label>
                                        <select name="vehiculo" class="form-control"  >
                                          <option value="" >-</option>
                                          @foreach($vehiculos as $vehiculo)
                                          <?php if ($vehiculo['id']==$gastos->vehiculo){ ?>
                                          <option value="{{$vehiculo['id']}}" selected="selected" >{{$vehiculo['NombreVehiculo']}}</option>
                                          <?php } else { ?>
                                          <option value="{{$vehiculo['id']}}">{{$vehiculo['NombreVehiculo']}}</option>
                                          <?php }?>
                                          @endforeach
                                       </select>
                                   </div>
                                   <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Conductor</label>
                                    <input type="text" class="form-control" name="conductor" value="{{$gastos->conductor}}">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Concepto</label>
                                    <input type="text" class="form-control" name="concepto" value="{{$gastos->concepto}}">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Referencia</label>
                                    <input type="text" class="form-control" name="referencia" value="{{$gastos->referencia}}">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Monto</label>
                                    <input type="number" class="form-control" name="monto" value="{{$gastos->monto}}" min="0" step="any">
                                </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Proveedor</label>
                                    <input type="text" class="form-control" name="proveedor" value="{{$gastos->proveedor}}">
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