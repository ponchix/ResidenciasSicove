<title>Vehiculos</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="man" class="table mt-2 table-borderless table-hover">
    <thead class="table-success">
        <th>ID</th>
        <th>Vehiculo</th>
        <th>Fecha Ingreso</th>
        <th>Adicionales</th>
        <th>Status</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($mantenimientos as $mantenimiento)
            <tr>
                <td>{{ $mantenimiento->id }}</td>
                <td>{{ $mantenimiento->VehiculosM->NombreVehiculo }}</td>
                <td>{{ $mantenimiento->fecha_inicio }}</td>
                <td>
                    <ul class="lista list-group">
                        <li class="list-group-item-light">Total: ${{ $mantenimiento->total }} </li>
                        <li class="list-group-item-light">Mantenimiento: {{ $mantenimiento->tipo_man }} </li>
                        <li class="list-group-item-light">Odómetro: {{ $mantenimiento->odometro }} Km </li>
                        <li class="list-group-item-light">Referencia: {{ $mantenimiento->referencia_man }}</li>
                    </ul>
                </td>
                <td>
                    @if ($mantenimiento->status == '1')
                        <a class="btn btn-info">{{ $mantenimiento->estado->status }}</a>
                    @else
                        <a class="btn btn-primary">{{ $mantenimiento->estado->status }}</a>
                    @endif
                </td>
                <td>
                    <form action="{{ route('servicios.destroy', $mantenimiento->id) }}" method="POST"
                        class="formulario">
                        @can('ver-vehiculo')
                            <a class="btn btn-light" href="{{ route('servicio.detallado', $mantenimiento->id) }}"><i
                                    class="fas fa-eye"></i></a>
                        @endcan
                        @can('editar-vehiculo')
                            @if ($mantenimiento->status == '2')
                                <a class="btn btn-info disabled"
                                    href="{{ route('mantenimiento.entrega', $mantenimiento->id) }}"><i
                                        class="fas fa-undo-alt"></i></a>
                            @else
                                <a class="btn btn-info" href="{{ route('mantenimiento.entrega', $mantenimiento->id) }}"><i
                                        class="fas fa-undo-alt"></i></a>
                            @endif

                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('borrar-vehiculo')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#man').DataTable({
            "order": [],
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sin resultados",
                "infoFiltered": "(filtrado desde _MAX_ registros totales)",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "search": "Buscar:",
                "zeroRecords": "No se encontraron coincidencias"

            }
        });
    });
</script>

<!--SweetAlert---->

<script>
    $('.formulario').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Quieres eliminar este vehículo?',
            text: "No podrás deshacer esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Borrar!',
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
