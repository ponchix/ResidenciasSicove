<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<table id="example" class="table mt-2 table-borderless table-hover">
  <thead class="table-success">
      <th>Fecha Ingreso</th>
      <th>Fecha Termino</th>
      <th>Servicios</th>
      <th>Referencia</th>
      <th>Mecanico</th>
  </thead>
  <tbody>
      @foreach($servicios as $servicio)
      <tr>
          <td>{{$servicio->fecha_inicio}}</td>
          <td>{{$servicio->fecha_alta}}</td>
          <td>{{$servicio->nombre}}</td>
          <td>{{$servicio->referencia_man}}</td>
          <td>{{$servicio->NombreMecanico}}</td>
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
      "lengthMenu":[[10,15,50,-1],[10,15,50,"All"]],
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