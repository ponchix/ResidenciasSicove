@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Tipo de Vehiculo</h3>
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

                            <form action="{{route('tipos.update',$tipos->id)}}" method="POST">
                                 @csrf
                                  @method('PUT')
                                <div class="row">
                                    <div class="col-md- col-xs-6 col-xs-6">
                                     <label>Tipo de Vehículo</label><span class="text-danger">*</span>
                                     <input type="text" name="Nombre" class="form-control" onkeyup="mayus(this);" value="{{$tipos->Nombre}}">
                                 </div>

                                </div> 
                          
                                 <div class="col-md- col-xs-6 col-xs-6 d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{route('tipos.index')}}" class="btn btn-danger ml-1">Cancelar</a>
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