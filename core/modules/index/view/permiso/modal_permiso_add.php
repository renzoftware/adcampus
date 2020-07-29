<?php
  $u=null;
  if(Session::getUID()!=""){
      $lista_menu = MenuData::getMenuAllActive();
      $lista_usuarios = UserData::getAllActive();
  }
  else{
    echo "<script>window.location='index.php';</script>";
  }

?>
<div id="addPermisoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">						
				<h3 class="modal-title">Asignar Permiso</h3> 
			</div>
			<form class="form-horizontal form-label-left" name="form_add_permiso" id="form_add_permiso">
				<div class="modal-body">					
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="add_usuario" id="add_usuario" required="">
								<option value="" > -- Seleccionar -- </option>
								<?php
								foreach ($lista_usuarios as $row) {
								?>
								<option value=<?php echo Core::encryption($row->id); ?> > <?php echo $row->username." - ".$row->name." ".$row->lastname; ?> </option>									
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Menu</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="add_menu" id="add_menu" required="">
								<option value="" > -- Seleccionar -- </option>
								<?php
								foreach ($lista_menu as $row) {
								?>
								<option value="<?php echo Core::encryption($row->IdMenu); ?>" > <?php echo $row->Descripcion." - ".$row->Ruta; ?> </option>									
								<?php
								}
								?>
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