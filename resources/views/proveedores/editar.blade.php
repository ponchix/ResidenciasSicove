<title>Proveedores | {{$proveedores->NombreProveedor}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Editar Proveedor</h3>
 </div>
 <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" >
             <div class="titulo mt-1">Información General</div>
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
           <form action="{{route('proveedores.update',$proveedores->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row">
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Nombre </label><span class="text-danger">*</span>
                  <input type="text" name="NombreProveedor" class="form-control" onkeyup="mayus(this);" value="{{$proveedores->NombreProveedor}}">
               </div>

               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>RFC</label><span class="text-danger">*</span>
                  <input type="text" name="RFC" class="form-control" onkeyup="mayus(this);" value=" {{$proveedores->RFC }}">
               </div><br>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Telefono Fijo</label><span class="text-danger">*</span>
                  <input type="text" name="TelefonoP" class="form-control" value=" {{$proveedores->TelefonoP }}"> 
               </div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Domicilio</label>
                  <input type="text" name="Domicilio" class="form-control" onkeyup="mayus(this);" value=" {{$proveedores->Domicilio }}">
               </div>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Correo</label><span class="text-danger">*</span>
                  <input type="text" name="correoP" class="form-control"  value=" {{$proveedores->correoP }}">
               </div>
               
               <div class="titulo">Contacto Directo</div>
               <div class="col-md-3 col-xs-3 col-xs-3">
                <label>Nombre de Contacto</label><span class="text-danger">*</span>
                  <input type="text" name="nombreContacto" class="form-control"  value=" {{$proveedores->nombreContacto }}">
               </div>
                <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Teléfono</label><span class="text-danger">*</span>
                  <input type="text" name="TelefonoC"  class="form-control  " id="datepicker" value=" {{$proveedores->TelefonoC }}">
               </div> 
              <div class="col-md-3 col-xs-3 col-xs-3">
                  <label>Correo Electrónico</label><span class="text-danger">*</span>
                  <input type="text" name="correo"  class="form-control  " id="datepicker" value=" {{$proveedores->correo }}">
               </div> 
<div class="col-xs-12 col-sm-12 col-md-12">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{route('proveedores.index')}}" class="btn btn-danger ml-2">Cancelar</a>
</div>   


</form>                                 
</div>

</div>
</div>
</div>
</div>
</div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function(e){
    $('#imagen').change(function(){
       let reader=new FileReader();
       reader.onload=(e)=>{
         $('#imagenSeleccionada').attr('src', e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
   });
 });
</script>

<script type="text/javascript">
  function mayus(e) {

     e.value = e.value.toUpperCase();


  }
</script>