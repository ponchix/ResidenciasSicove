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
                            <form action="{{route('asignaciones.update',$asignaciones->id)}}" method="POST"  autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Conductor</label><span class="text-danger">*</span>
                                    <select name="conductor" class="form-control" >
                                       <option value="" disabled >-</option>
                                       @foreach($conductores as $conductor)
                                       <?php if ($conductor['id']==$conductor->NombreConductor){ ?>
                                       <option value="{{$conductor['id']}}" selected  disabled>{{$conductor->user->name}}</option>
                                       <?php } else { ?>
                                        <option value="{{$conductor['id']}}">{{$conductor->user->name}}</option>
                                        <?php }?>
                                       @endforeach
                                           </select>
                               </div>
                                <div class="col-md-3 col-xs-3 col-xs-3">
                                    <label>Vehiculo</label><span class="text-danger">*</span>
                                    <select name="vehiculo" class="form-control">
                                       <option value="" disabled>-</option>
                                       @foreach($vehiculos as $vehiculo)
                                       <?php if ($vehiculo['id']==$vehiculo->NombreConductor){ ?>
                                       <option value="{{$vehiculo['id']}}" selected="selected">{{$vehiculo['NombreVehiculo']}}</option>
                                       <?php } else { ?>
                                        <option value="{{$vehiculo['id']}}">{{$vehiculo['NombreVehiculo']}}</option>
                                        <?php }?>
                                       @endforeach
                                           </select>
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Fecha de asignacion</label><span class="text-danger">*</span>
                                   <input type="date" class="form-control" name="fecha_a" min="2020-11-11" value="{{$asignaciones->fecha_a}}" readonly>
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Fecha de entrega</label><span class="text-danger">*</span>
                                   <input type="date" class="form-control" name="fecha_e" min="2020-11-11" value="<?php echo date("Y-m-d");?>">
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Odometro Actual</label><span class="text-danger">*</span>
                                   <input class="form-control" type="number" name="odometro_a" min="0" step="any" value="{{$asignaciones->odometro_a}}" readonly>
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Odometro Final</label><span class="text-danger">*</span>
                                   <input class="form-control" type="number" name="odometro_e" min="0" step="any" value="{{$asignaciones->odometro_e}}">
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                   <label>Combustible Actual</label><span class="text-danger">*</span>
                                   <input type="number" name="combustible_a" min="0" class="form-control" value="{{$asignaciones->combustible_a}}" readonly>
                               </div>
                               <div class="col-md-3 col-xs-3 col-xs-3">
                                <label>Combustible Final</label><span class="text-danger">*</span>
                                <input type="number" name="combustible_e" min="0" class="form-control" value="{{$asignaciones->combustible_e}}">
                            </div>


                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                                <a class="btn btn-danger mt-3" href="{{route('asignaciones.index')}}">Regresar</a>
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
   var x,y,suma,text;  
   x = document.getElementById("qty").value;  
   y = document.getElementById("qty2").value;  
   if (isNaN(x) || isNaN(y)) {  
     text = "Es necesarios introducir dos números válidos";  
   } else {  
     //si no ponemos parseFloat concatenaría x con y  
     suma=parseFloat(x)+parseFloat(y);  
     text= suma;  
   }  
   document.getElementById("total").value=text;  
 }  
        </script>


