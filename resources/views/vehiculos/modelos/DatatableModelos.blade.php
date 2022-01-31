<title>Modelos</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="example" class="table mt-2 table-borderless table-hover">
    <thead class="table-success">
        <th>Marca</th>
        <th>Modelo</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($modelos as $modelo)
            <tr>
                <td>{{ $modelo->marcas->marca }}</td>
                <td>{{ $modelo->modelo }}</td>
                <td>
                    <form action="{{ route('modelos.destroy', $modelo->id) }}" method="POST" class="formulario">

                        {{-- @can('editar-vehiculo')
                            <a class="btn btn-success " href="{{ route('modelos.edit', $modelo->id) }}"><i
                                    class="fas fa-edit"></i></a>

                        @endcan --}}

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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
        $('#example').DataTable({
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
            title: '¿Quieres eliminar este modelo?',
            text: "Asegurate que no este siendo utilizado",
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
