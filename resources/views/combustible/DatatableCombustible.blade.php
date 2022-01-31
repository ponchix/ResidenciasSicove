<title>Conductores</title>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="com" class="table mt-2 table-borderless table-hover align-middle">
    <thead class="table-success">
        <th>ID</th>
        <th>Vehiculo</th>
        <th>Registro</th>
        <th>Proveedor</th>
        <th>Conductor</th>
        <th>Datos Carga</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($cargas as $carga)
            <tr >
                <td>{{ $carga->id }}</td>
                <td>{{ $carga->vehiculos->NombreVehiculo }}</td>
                <td class="align-middle">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-light">Fecha: {{$carga->fecha_carga}}</li>
                        <li class="list-group-item list-group-item-light">Hora: {{$carga->hora_carga}}</li>
                    </ul>
                </td>
                <td>{{$carga->proveedores->NombreProveedor}}</td>
                <td>{{$carga->conductores->NombreConductor}}</td>
                <td class="align-middle">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-light"> ${{$carga->costo_uni}}<strong>/Lt</strong></li>
                        <li class="list-group-item list-group-item-light"> {{$carga->cantidad}}<strong>Lt</strong></li>
                        <li class="list-group-item list-group-item-dark"> Total: ${{$carga->total}}</li>
                    </ul>
                </td>
                <td>
                    <form action="{{route('combustible-carga.destroy',$carga->id)}}" method="POST" class="formulario">

                        <a class="btn btn-success " href="{{route('combustible-carga.edit',$carga->id)}}"><i class="fas fa-edit"></i></a>
                       
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>

    
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
        $('#com').DataTable({
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
            title: '¿Quieres eliminar a este conductor?',
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


