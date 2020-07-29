<?php
  $sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
  
  $obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
  $obj_subcategoria = SubCategoriaData::getSubCategoriaByIdSubCat($obj_lineasolicitud->Lin_SubCat_nIdSubCategoria);

  $fecha_aprob = (is_null($obj_lineasolicitud->Lin_dFechaAprob)?"":$obj_lineasolicitud->Lin_dFechaAprob);

  $val_linsol_subcat = $obj_subcategoria->SubCat_vSubCategoria." ".$obj_subcategoria->SubCat_vDescripcion." [Cta: ".$obj_subcategoria->Cta_cGlobal." ".$obj_subcategoria->Cta_vDescripcion."]";
?>

<div class="row mb-1 form-group">
  <div class="col-sm-6">
    <label for="date_linsol_faprob" class="">Fecha Ult. Aprob.</label>
    <input name="date_linsol_faprob" id="date_linsol_faprob" type='text' class="form-control" value="<?php echo $fecha_aprob;?>" required />
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span> 
  </div>
</div>



