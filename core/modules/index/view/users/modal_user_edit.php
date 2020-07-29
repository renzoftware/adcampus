<div id="editUserModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">						
				<h3 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h3> 
			</div>
			<form class="form-horizontal form-label-left add"  name="form_edit_user" id="form_edit_user">
				<div class="modal-body">					
					<input type="hidden" name="edit_id" id="edit_id" >
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="edit_usuario" id="edit_usuario" class="form-control" readonly>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="edit_name" id="edit_name" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="edit_apellido" id="edit_apellido" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Clave</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="password" name="edit_clave" id="edit_clave" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="edit_tipousuario" id="edit_tipousuario" required="">
								<option value="1"> Analista </option>
								<option value="2"> Adm. Campus </option>
								<option value="3"> Asistente CAL</option>
								<option value="4"> Técnico UPN </option>
								<option value="5"> Técnico EULEN</option>
								<option value="6"> Gestor Cobranza</option>
								<option value="7"> Supervisor Cobranza</option>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Campus</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="edit_campus" id="edit_campus" required="">
								<option value="1"> El Molino </option>
								<option value="2"> San Isidro </option>
							</select>
						</div>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" id="edit_btncancel" name="edit_btncancel" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
					<input type="submit" id="edit_btnedit" name="edit_btnedit" class="btn btn-primary" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</div>