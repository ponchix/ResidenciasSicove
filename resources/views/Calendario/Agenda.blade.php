<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registro de Evento</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="" id="myform">
					@csrf
					<div class="form-group">
						<input type="hidden" name="id" id="id" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Titulo</label>
						<input type="text" name="title" class="form-control" placeholder="Escribe el titulo del evento" id="title">
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
					</div>
					<div class="form-group ">
						<label>Comienzo</label>
						<input type="date" name="start" id="start" class="form-control" placeholder="Comienzo del evento">
					</div>
					<div class="form-group ">
						<label>Final</label>
						<input type="date" name="end" id="end" class="form-control" placeholder="Final del evento">
					</div>

				</form>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
				<button type="button" class="btn btn-warning" id="modificar">Modificar</button>
				<button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

