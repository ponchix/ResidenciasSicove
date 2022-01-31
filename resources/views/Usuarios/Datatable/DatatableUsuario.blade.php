 <title>Usuarios</title>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
 <table  id="user" class="table table-hover mt-2">
   <thead class="table-success">
       <th>ID</th>
       <th>Nombre</th>
       <th>E-mail</th>
       <th>Rol</th>
       <th>Acciones</th>
   </thead>
   <tbody>
      @foreach($usuarios as $usuario)
      <tr>
          <td>{{$usuario->id}}</td>
          <td>{{$usuario->name}}</td>
          <td>{{$usuario->email}}</td>
          <td>
              @if(!empty($usuario->getRoleNames()))
              @foreach($usuario->getRoleNames() as $rolName)
              <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
              @endforeach
              @endif
          </td>
          <td>
          
              <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
              {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy',$usuario->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Borrar',['class'=>'btn btn-danger'])!!}
              {!! Form::close() !!}

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
    $('#user').DataTable({
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