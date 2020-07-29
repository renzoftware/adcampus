<?php
  $u=null;
  if(Session::getUID()!=""){
      $lista_menu = MenuData::getMenuAllActive();
  }
  else{
    echo "<script>window.location='index.php';</script>";
  }

?>

<div id="editPermisoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">						
				<h3 class="modal-title" id="exampleModalLongTitle">Editar Permiso</h3> 
			</div>
			<form class="form-horizontal form-label-left add"  name="form_edit_permiso" id="form_edit_permiso">
				<div class="modal-body">					
					<input type="hidden" name="edit_id" id="edit_id" >
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="edit_usuario" id="edit_usuario" class="form-control" disabled="false">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Menu</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="edit_menu" id="edit_menu" required="" disabled="false">
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
					
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="edit_estado" id="edit_estado" required="">
								<option value="1"> Activo </option>
								<option value="0"> Inactivo </option>
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