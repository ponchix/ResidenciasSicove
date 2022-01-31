<title>Vehiculos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Modelos Registrados</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
<div class="mensaje"></div>
                        <a href="{{route('modelos.create')}}" class="btn btn-outline-primary btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-car-crash "></i> Vehiculos</a>
                      <div class="titulo">Tabla de Modelos</div>
                        @include('vehiculos/modelos.DatatableModelos')
             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
@section('js')
@if (session('mensaje') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El Modelo Fue Eliminado',
        'success'
    )
</script>
@endif
@if (session('add')=='agregar')
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Nuevo Modelo Registrado',
  showConfirmButton: false,
  timer: 1000,
  heightAuto:false,
})
</script>
    
@endif

@if (session('mensaje')=='ok')
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'El Modelo ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection
