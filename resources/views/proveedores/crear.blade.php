<title>Alta Proveedores</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Alta de Proveedores</h3>
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
                                <span aria-hidden="true">&times;</span>  </button>
                            </div>
                            @endif
                            <form action="{{route('proveedores.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                             @csrf
                             <div class="row">
                              <div class="col-md-6 col-xs-6 col-xs-6">
                                 <label>Nombre</label><span class="text-danger">*</span>
                                 <input type="text" name="NombreProveedor" class="form-control" onkeyup="mayus(this);" value="{{old('NombreProveedor')}}">
                              </div>
                             <div class="col-md-6 col-xs-6 col-xs-6">
                                 <label>RFC</label><span class="text-danger">*</span>
                                 <input type="text" name="RFC" class="form-control" onkeyup="mayus(this);" value="{{old('RFC')}}">
                             </div>
                             <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Telefono Fijo</label><span class="text-danger">*</span>
                                 <input type="text" name="TelefonoP" class="form-control" onkeyup="mayus(this);" autocomplete="nope" value="{{old('TelefonoP')}}">
                             </div>                         
                             <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Domicilio</label><span class="text-danger">*</span>
                                 <input type="text" name="Domicilio" class="form-control" onkeyup="mayus(this);" value="{{old('Domicilio')}}">
                                <br>  
                             </div>   
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Correo Electrónico</label><span class="text-danger">*</span>
                                 <input type="text" name="correoP" class="form-control" autocomplete="nope" value="{{old('correoP')}}">
                                  </div>                                          
                             <div class="titulo">Contacto Directo</div>                                                       
                             <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Nombre de Contacto</label><span class="text-danger">*</span>
                                 <input type="text" name="nombreContacto" class="form-control" onkeyup="mayus(this);" value="{{old('nombreContacto')}}">
                             </div>  
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Teléfono</label><span class="text-danger">*</span>
                                 <input type="text" name="TelefonoC" class="form-control" autocomplete="nope" value="{{old('TelefonoC')}}">
                             </div>  
                            <div class="col-md-4 col-xs-4 col-xs-4">
                                 <label>Correo Electrónico</label><span class="text-danger">*</span>
                                 <input type="text" name="correo" class="form-control" autocomplete="nope" value="{{old('correo')}}">
                             </div> 

                </div> 
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{route('proveedores.index')}}" class="btn btn-danger ml-2">Cancelar</a>
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
    function mayus(e) {

       e.value = e.value.toUpperCase();


   }
</script>

