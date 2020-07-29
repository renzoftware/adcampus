<div id="deleteUserModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">						
				<h3 class="modal-title" id="exampleModalLongTitle">Eliminar Usuario</h3> 
			</div>
			<form name="form_user_delete" id="form_user_delete">
				<div class="modal-body">					
					<h2>¿Seguro que quieres eliminar al usuario: <b><span id="txt_del_usuario">&nbsp;</span></b>?</h2>
					<h4 class="text-warning"><i><small>Esta acción no se puede deshacer.</small></i></h4>
					<input type="hidden" name="delete_id" id="delete_id">
				</div>
				<div class="modal-footer">
					<input type="button" id="delete_btncancel" name="delete_btncancel" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
					<input type="submit" id="delete_btndelete" name="delete_btnedit" class="btn btn-primary" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>