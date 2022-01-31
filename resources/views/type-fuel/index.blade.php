<title>Tipos Combustibles</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Tipos de combustibles</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('tipos-combustibles.create')}}" class="btn btn-outline-primary btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{route('combustible-carga.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-gas-pump    "></i> Combustible</a>
                        <div class="titulo">Tipos de Combustibles Registrados</div>
                       @include('type-fuel.DatatableTiposCombustible')

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection