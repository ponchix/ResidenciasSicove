<title>Modelos</title>
@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Alta de Modelos</h3>
    </div>
    <div class="section-body">
        <div class="row">
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

                            <form action="{{route('modelos.store')}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                 <div class="col-md-6 col-xs-6 col-xs-6">
                                     <label>Modelo</label>
                                     <input type="text" name="modelo" class="form-control" onkeyup="mayus(this);">
                                 </div>

                                 <div class="col-md-6 col-xs-6 col-xs-6">
                                     <label>Marca</label>
                                     <select class="form-control" name="id_marca">
                                         @foreach($marcas as $marca)
                                         <option value="{{$marca['id']}}"> {{$marca['marca']}}</option>
                                         @endforeach
                                     </select>

                                 </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ml-1">
                                    <button type="submit" class="btn btn-primary" id="prueba">Guardar</button>
                                    <a href="{{route('vehiculos.index')}}" class="btn btn-danger ml-2">Cancelar</a>
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

