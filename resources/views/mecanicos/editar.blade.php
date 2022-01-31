<title>mecanicos</title>
@extends('layouts.app')
@section('content')
<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Editar Mecanico</h3>
 </div>
 <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" >
             <div class="titulo mt-1">Información del Mecanico</div>
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
           <form action="{{route('mecanico.update',$mecanicos->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row">
                 <div class="card">
                    <div class="col-md-12 col-xs-12 col-xs-12 mb-1">
                        <img id="imagenSeleccionada" width="150px" src="/mecanicos/{{$mecanicos->imagen}}" class="card-img-top perfil  rounded mx-auto d-block">
                      </div>
                 </div>
                 <div class="position-relative">
                    <div class="position-absolute top-100 start-50 translate-middle mb-3">
                        <label for="">Subir Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="separacion form-control" >
                    </div>
                 </div>

           
               <div class="col-md-4 col-xs-4 col-xs-4 mt-5">
                  <label>Nombre(s)</label><span class="text-danger">*</span>
                  <input type="text" name="NombreMecanico" class="form-control" onkeyup="mayus(this);" value="{{$mecanicos->NombreMecanico}}">
               </div>

               <div class="col-md-4 col-xs-4 col-xs-4 mt-5">
                  <label>Apellido Paterno</label><span class="text-danger">*</span>
                  <input type="text" name="APaterno" class="form-control" onkeyup="mayus(this);" value=" {{$mecanicos->APaterno }}">
               </div><br>
                <div class="col-md-4 col-xs-4 col-xs-4 mt-5">
                  <label>Apellido Materno</label><span class="text-danger">*</span>
                  <input type="text" name="AMaterno" class="form-control" onkeyup="mayus(this);" value=" {{$mecanicos->AMaterno }}"> 
               </div>
               <div class="col-md-4 col-xs-4 col-xs-4 mt-4">
                  <label>Edad</label>
                  <input type="text" name="edad" class="form-control"  value=" {{$mecanicos->edad }}">
               </div>
                <div class="col-md-4 col-xs-4 col-xs-4 mt-4">
                  <label>Direccion</label><span class="text-danger">*</span>
                  <input type="text" name="direccion" class="form-control" onkeyup="mayus(this);" value=" {{$mecanicos->direccion }}">
               </div>
               <div class="col-md-4 col-xs-4 col-xs-4 mt-4">
                  <label>Telefono</label><span class="text-danger">*</span>
                  <input type="text" name="telefono" class="form-control" value=" {{$mecanicos->telefono }}">
               </div>
       
<div class="col-xs-12 col-sm-12 col-md-12 mt-2">
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="{{route('mecanico.index')}}" class="btn btn-danger ml-2">Cancelar</a>
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