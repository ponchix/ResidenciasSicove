<title>Incidentes</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="example" class="table table-striped mt-2 mb-5">
  <thead class="table-success">
      <th>ID</th>
      <th>Vehiculo</th>
      <th>Reporte</th>
      <th>Importancia</th>
      <th>Foto</th>
      <th>Acciones</th>
  </thead>
  <tbody>
      @foreach($incidentes as $incidente)
      <tr>
          <td>{{$incidente->id}}</td>
          <td>{{$incidente->VehiculosI->NombreVehiculo}}</td>
          <td>{{$incidente->Fecha_reporte}}</td>
          <td>@if($incidente->importancia=='Alta')
                <span class=" badge bg-danger">{{$incidente->importancia}}</span>
                @elseif($incidente->importancia=='Media')
                <span class="badge bg-warning">{{$incidente->importancia}}</span>
                @elseif($incidente->importancia=='Baja')
                <span class="badge bg-primary">{{$incidente->importancia}}</span>
                @endif
          </td>
          <td><img src="/incidente/{{$incidente->foto}}" width="120" height="90px"></td>
          <td>
              <form action="{{route('incidentes.destroy',$incidente->id)}}" method="POST" class="formulario">
                  <a class="btn btn-success" href="{{route('incidentes.edit',$incidente->id)}}"><i class="fas fa-edit"></i></a>
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
          title: '¿Quieres eliminar este Incidente?',
          text: "",
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