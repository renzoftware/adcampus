<?php
  $sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
  
  $obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);

  $value_oc = "";
  $obj_ordencompra = new OrdenCompraData();
  $obj_proveedor = new ProveedorData();
  if(is_null($obj_lineasolicitud->Lin_OC_nIdOrdenCompra)){
    echo "";
  }
  else{
    $obj_ordencompra = OrdenCompraData::getOCByIdOc($obj_lineasolicitud->Lin_OC_nIdOrdenCompra);
    $obj_proveedor = ProveedorData::getProveedorByIdProveedor($obj_ordencompra->OC_Prov_nIdProveedor);
  }

  if(is_null($obj_lineasolicitud->Lin_dFechaAprob)){
    echo "<div>Línea no cuenta con Fecha de Aprobación. Verificar Fase 2.</div>";
    exit();
  }

?>

  <div class="row mb-1 form-group">
    <div class="col-sm-3">
      <label for="txt_linsol_edit_oc" class="">Orden Compra</label>
      <input type="number" min=60000 class="form-control" name="txt_linsol_edit_oc" id="txt_linsol_edit_oc"  maxlength="40" value="<?php echo $obj_ordencompra->OC_nNroOC ;?>" required>
        
      <input name="txt_linsol_edit_oc_data" id="txt_linsol_edit_oc_data" value="<?php echo $obj_lineasolicitud->Lin_OC_nIdOrdenCompra;?>" type="hidden" >
    </div>

    <div class="col-sm-9">
      <label for="txt_linsol_edit_proveedor" class="">Proveedor</label>
      <div id="progressbar_oc_prov" class="mb-3 progress">
        <div class="progress-bar progress-bar-animated bg-warning progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
      </div>
      <div id="div_linsol_edit_proveedor">
        <input type="text" class="form-control" name="txt_linsol_edit_proveedor" id="txt_linsol_edit_proveedor"  maxlength="40" value="<?php echo $obj_proveedor->Prov_vNombreProveedor ;?>" required>
        
        <input name="txt_linsol_edit_proveedor_data" id="txt_linsol_edit_proveedor_data" value="<?php echo "";?>" type="hidden" >
      </div>
    </div>
  </div>
