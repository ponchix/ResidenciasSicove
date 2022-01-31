<title>Gastos</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Gastos</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                        <a href="{{route('gastos.create')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus"> </i>Registrar</a>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-car"></i>Vehiculos</a>
                  <div class="titulo mt-3 mb-1">Bitacora de Gastos</div>

                  <div class="table-responsive">  
                     @include('vehiculos/gastos.DatatableGastos')
                 </div>
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
  title: 'Gasto Registrado',
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
    title: 'Este gasto ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>