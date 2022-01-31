<title>Roles</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registro de Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" >
                            
                            @can('crear-role')
                            <a  href="{{route('roles.create')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus"> </i>Nuevo</a>
                            @endcan

                            <table class="table table-hover mt-2">
                            	<thead class="table-success">
                            		<th>Rol</th>
                            		<th>Acciones</th>
                            	</thead>
                            	<tbody>
                            		@foreach($roles as $role)
                            		<tr>
                            			<td>{{$role->name}}</td>
                            			<td>
                            				@can('editar-role')
                            				<a href="{{ route('roles.edit',$role->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>	
                            				@endcan
                            				@can('borrar-role')
                            				{!! Form::open(['method'=>'DELETE','route'=>['roles.destroy',$role->id],'style'=>'display:inline']) !!}
                            				{!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                            				{!! Form::close() !!}
                            				@endcan
                            			</td>
                            		</tr>
                            		@endforeach
                            	</tbody>
                            </table>
                            <div class="pagination justify-content-end">
                            	{!! $roles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@if (session('mensaje')=='ok')
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'El Rol ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection