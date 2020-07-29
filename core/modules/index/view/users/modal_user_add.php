<div id="addUserModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">						
				<h3 class="modal-title">Nuevo Usuario</h3> 
			</div>
			<form class="form-horizontal form-label-left" name="form_add_user" id="form_add_user">
				<div class="modal-body">					
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="add_usuario" id="add_usuario" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="add_name" id="add_name" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Apellido</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="add_apellido" id="add_apellido" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Clave</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="password" name="add_clave" id="add_clave" class="form-control" required>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="add_tipousuario" id="add_tipousuario" required="">
								<option value=""> - Seleccionar - </option>
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
							<select class="form-control" name="add_campus" id="add_campus" required="">
								<option value=""> - Seleccionar - </option>
								<option value="1"> El Molino </option>
								<option value="2"> San Isidro </option>
							</select>
						</div>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" id="add_btncancel" name="add_btncancel" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
					<input type="submit" id="add_btnadd" name="add_btnadd" class="btn btn-primary" value="Registrar">
				</div>
			</form>
		</div>
	</div>
</div>