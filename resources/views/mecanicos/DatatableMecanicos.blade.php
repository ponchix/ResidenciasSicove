<title>Mecanicos</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="man" class="table mt-2 table-borderless table-hover">
  <thead class="table-success">
      <th>ID</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Acciones</th>
  </thead>
  <tbody>
      @foreach($mecanicos as $mecanico)
      <tr>
          <td>{{$mecanico->id}}</td>
          <td> <img src="/mecanicos/{{$mecanico->imagen}}" width="80" height="90px"> </td>
         <td>{{$mecanico->NombreMecanico}}</td>
          <td>
              <form action="{{route('mecanico.destroy',$mecanico->id)}}" method="POST" class="formulario">
                  @can('editar-vehiculo')
                 <a class="btn btn-success" href="{{route('mecanico.edit',$mecanico->id)}}"><i class="fas fa-edit"></i></a> 
                  @endcan
                  @csrf
                  @method('DELETE')
                  @can('borrar-vehiculo')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                  @endcan
                                      @can('editar-vehiculo')
                    <a class="btn btn-light" href="{{route('mecanico.show',$mecanico->id)}}"><i class="fas fa-eye"></i></a>
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
  $('#man').DataTable({
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
        title: '¿Quieres eliminar a este mecánico?',
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