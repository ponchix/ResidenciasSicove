<title>Asignaciones</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="asignacion" class="table mt-2 table-borderless table-hover">
  <thead class="table-success table-sm align-middle">
      <th>ID</th>
      <th>Fecha Asignacion</th>
      <th>Vehiculo</th>
      <th>Status</th>
      <th>Acciones</th>
  </thead>
  <tbody>
      @foreach($asignaciones as $asignacion)
      <tr>
          <td>{{$asignacion->id}}</td>
         <td>{{$asignacion->fecha_a}}</td>
         <td>{{$asignacion->vehiculos->NombreVehiculo}}</td>
         @if ($asignacion->status=="1")
         <td><a class="btn btn-info">{{$asignacion->estado->status}}</a></td>
         @else
         <td><a  class="btn btn-primary">{{$asignacion->estado->status}}</a></td>
         @endif
     

          <td>
              <form action="{{route('asignaciones.destroy',$asignacion->id)}}" method="POST" class="formulario">
                @can('ver-vehiculo')
                
                <a class="btn btn-light" href="{{route('asignaciones.show',$asignacion->id)}}"><i class="fas fa-eye"></i></a>
                @endcan 
                  @can('editar-vehiculo')
                  @if ($asignacion->status=="1")
                  <a class="btn btn-info" href="{{route('asignacion.entrega',$asignacion->id)}}"><i class="fas fa-undo-alt"></i></a>
                  @else
                  <a class="btn btn-info disabled" href="{{route('asignacion.entrega',$asignacion->id)}}"><i class="fas fa-undo-alt"></i></a>   
                  @endif
                  @endcan
                  @csrf
                  @method('DELETE')
                  @can('borrar-vehiculo')
                  @if ($asignacion->status=="2")
                  <button type="submit" class="btn btn-warning"><i class="far fa-folder"></i></button>
                  @endif
                  
                  @endcan
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
  $('#asignacion').DataTable({
    "order":[[ 0, 'desc' ]],
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
        title: '¿Deseas Archivar?',
        text: "No podrás deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Archivar!',
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
    }
})

});
</script>