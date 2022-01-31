<title>Mecanicos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Mecánicos</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('mecanico.create')}}" class="btn btn-outline-primary mb-0 mt-1"><i class="fas fa-plus"></i> Nuevo</a>
                       
                        <div class="titulo mt-3 mb-1">Lista de Mecánicos</div>

                        <div class="table-responsive">  
                           @include('mecanicos.DatatableMecanicos')
                       </div>

             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
@section('js')
@if (session('add') == 'agregar')
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Mecanico Registrado',
        showConfirmButton: false,
        timer: 1000,
        heightAuto: false,
    })
</script>
@endif
@if (session('mensaje')=='ok')
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'El Mecanico ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection