<title>Alta Mecanicos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Alta de Mecanicos</h3>
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
                                <span aria-hidden="true">&times;</span>  </button>
                            </div>
                            @endif
                            <form form action="{{route('mecanico.store')}}" method="POST" enctype="multipart/form-data" autocomplete="nope">
                            @csrf
                            <div class="row">
                            
                                <div class="col-md-12 col-xs-12 col-xs-12 mb-5">
                                    @include('mecanicos.imagen')
                                </div>

                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Nombre:</label><span class="text-danger">*</span>
                                    <select name="NombreMecanico" class="form-control">
                                       <option value="">-</option>
                                       @foreach($mecanicos as $mecanico)
                                       <option>{{$mecanico->name}}</option>
                                       @endforeach
                                           </select>
                               </div>
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Apellido Paterno</label><span class="text-danger">*</span>
                                    <input type="text" name="APaterno" class="form-control" onkeyup="mayus(this);" autocomplete="off">
                                </div>
                                
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Apellido Materno</label><span class="text-danger">*</span>
                                    <input type="text" name="AMaterno" class="form-control" onkeyup="mayus(this);" autocomplete="off">
                                </div> 

                     

                            <div class="col-md-4 col-xs-4 col-xs-4">
                                <label>Edad</label>
                                <input type="text" name="edad" class="form-control" autocomplete="off">
                               <br>  
                            </div>                               
                        
 
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Dirección</label><span class="text-danger">*</span>
                                    <input type="text" name="direccion" class="form-control" onkeyup="mayus(this);" autocomplete="nope">
                                </div>   
    
                                <div class="col-md-4 col-xs-4 col-xs-4">
                                    <label>Telefono</label><span class="text-danger">*</span>
                                    <input type="text" name="telefono" class="form-control" autocomplete="nope">
                                </div>                                                                            

                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                                   <a href="{{route('mecanico.index')}}" class="btn btn-danger ml-2 mt-2">Cancelar</a>
                               </div>  

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
<script type="text/javascript">
    function mayus(e) {

       e.value = e.value.toUpperCase();


   }
</script>

