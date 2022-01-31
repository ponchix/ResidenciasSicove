<title>Catalogo de Servicios</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Catalogo de Servicios</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        
                        <div class="btn-group " role="group" aria-label="Button group with nested dropdown">
                            <a class="btn btn-outline-primary btn-lg" href="{{route('catalogo.create')}}"><i class="fas fa-plus"></i> Nuevo</a>
                            <a class="btn btn-outline-primary btn-lg ml-2" href="{{route('servicios.index')}}"><i class="fas fa-exclamation-circle"></i> Bitacora</a>
                            <div class="btn-group" role="group">

                            </div>
                        </div>
<div class="titulo">Servicios Vigentes</div>
@include('service.DatatableService')

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
@section('js')
@if (session('add')=='agregar')
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Servicio Registrado',
  showConfirmButton: false,
  timer: 1000,
  heightAuto:false,
})
</script>
    
@endif
@endsection