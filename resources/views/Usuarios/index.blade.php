<title>Usuarios</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                         <a href="{{route('usuarios.create')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus"> </i>Nuevo</a><br><br>
                         <div class="titulo mt-3 mb-1"> </div>
                         <div class="table-responsive">
@include('Usuarios/Datatable.DatatableUsuario')
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@if (session('mensaje')=='ok')
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'El Usuario ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection

