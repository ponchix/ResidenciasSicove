  <title>Conductores</title>
 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <table id="example" class="table mt-2 table-borderless table-hover">
    <thead class="table-success">
        <th>ID</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Estado</th>
              <th>Acciones</th>
    </thead>
     <tbody>
        @foreach($conductores as $conductor)
        <tr>
            <td>{{$conductor->id}}</td>
            <td> <img src="/conductor/{{$conductor->imagen}}" width="80" height="90px"> </td>
            <td>{{$conductor->NombreConductor}}</td>

            <td>
                @if ($conductor->status=="1")
                <a class="editable editable-click btn btn-info" id="status" data-type="select" data-pk="{{$conductor->id}}" 
                    data-url="{{url("/status/conductor/$conductor->id")}}" 
                    data-title="Enter status"
                    data-value="{{$conductor->status}}"> 
                    {{$conductor->estado->status}}
                </a>
                @elseif($conductor->status=="2")
                <a  class="editable editable-click btn btn-primary" id="status" data-type="select" data-pk="{{$conductor->id}}" 
                    data-url="{{url("/status/conductor/$conductor->id")}}" 
                    data-title="Enter status"
                    data-value="{{$conductor->status}}"> 
                    {{$conductor->estado->status}}
                </a>
                @endif
                </td>
<td>
                <form action="{{route('conductores.destroy',$conductor->id)}}" method="POST" class="formulario">
                    @can('editar-vehiculo')
                    <a class="btn btn-light" href="{{route('conductores.show',$conductor->id)}}"><i class="fas fa-eye"></i></a>
                    @endcan
                    @if ($conductor->status=="1")
                    @can('editar-vehiculo')
                    <a class="btn btn-success disabled" href="{{route('conductores.edit',$conductor->id)}}"><i class="fas fa-edit"></i></a>
                    
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('borrar-vehiculo')
                    <button type="submit" class="btn btn-danger disabled"><i class="fas fa-trash-alt"></i></button>
                    @endcan
                    @else
                    @can('editar-vehiculo')
                    <a class="btn btn-success " href="{{route('conductores.edit',$conductor->id)}}"><i class="fas fa-edit"></i></a>
                    
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('borrar-vehiculo')
                    <button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>
                    @endcan
                    @endif

                </form>         
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu":[[5,10,50,-1],[5,10,50,"All"]],
        "language":{
         "lengthMenu":"Mostrar _MENU_ registros",
         "info":"Mostrando pagina _PAGE_ de _PAGES_",
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
} ); 
</script>

<!--SweetAlert---->

<script >
    $('.formulario').submit(function(e){
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
