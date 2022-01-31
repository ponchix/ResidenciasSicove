<title>Tipos de Vehiculos</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tipos de Vehiculos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('tipos.create') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fas fa-plus"> </i>Nuevo</a>
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fas fa-car"></i>Vehiculos</a>

                            <div class="titulo mt-3 mb-1">Tipos Disponibles</div>

                            <div class="table-responsive">
                                @include('vehiculos/Tipos.DatatableTipo')
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
    title: 'El Tipo de Vehiculo ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection