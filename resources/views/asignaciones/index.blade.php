<title>Asignaciones</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asignacion de Vehiculo</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('asignacion.archivado') }}" class="btn btn-outline-primary mb-0 mt-1"><i
                                    class="far fa-folder"></i> Archivados</a>
                                    
                            <div class="titulo mt-3 mb-1">Asignaciones</div>
                            <div class="table-responsive">
                                @include('asignaciones.DatatableAsignacion')
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
                title: 'Asignacion Activa',
                showConfirmButton: false,
                timer: 1000,
                heightAuto: false,
            })
        </script>
    @endif
    @if (session('archive') == 'ok')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Asignacion Ha Sido Archivada',
            showConfirmButton: false,
            timer: 1000,
            heightAuto: false,
        })
    </script>
@endif
@endsection
