<title>Conductores</title>
<link rel="stylesheet" href="{{ asset('assets/jqueryui-editable.css') }}" type="text/css">
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Conductores</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a class="btn btn-outline-primary btn-lg" href="{{ route('conductores.create') }}"><i
                                        class="fas fa-plus"> </i> Nuevo</a>
                                <br>
                            </div>
                            <div class="titulo mt-3 mb-1">Conductores</div>
                            <div class="table-responsive">
                                @include('conductores.DatatableConductores')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- <script>
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type:'PUT'};
    $(document).ready(function() {
    $('.editable').editable({

            source:[
            {value:"1", text: "ASIGNADO"},
            {value:"2", text: "DISPONIBLE"},
        ]
    });
    });
    </script> --}}
    @if (session('add') == 'agregar')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Conductor Registrado',
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
        title: 'El Conductor ha sido eliminado',
        showConfirmButton: false,
        timer: 1500
      }) 
    </script>
    @endif
@endsection
<script type="text/javascript" src="{{ asset('assets/jqueryui-editable.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
