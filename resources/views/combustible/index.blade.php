<title>Combustible</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Combustible</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        {{-- <a href="{{route('combustible-carga.create')}}" class="btn btn-outline-primary btn-lg "><i class="fa fa-plus" aria-hidden="true"></i> Cargar</a> --}}
                        <a href="{{route('tipos-combustibles.index')}}" class="btn btn-outline-primary btn-lg "><i class="fas fa-tint    "></i> Tipos de Combustible</a>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-outline-primary btn-lg derecha"><i class="fa fa-car" ></i> Vehiculos</a>
                        <div class="titulo">Cargas de Combustible</div>
                       @include('combustible.DatatableCombustible')

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection