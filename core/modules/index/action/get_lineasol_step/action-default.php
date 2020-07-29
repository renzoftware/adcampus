<?php
  $sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
  
  $obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
  $obj_subcategoria = SubCategoriaData::getSubCategoriaByIdSubCat($obj_lineasolicitud->Lin_SubCat_nIdSubCategoria);

  $val_linsol_subcat = $obj_subcategoria->SubCat_vSubCategoria." ".$obj_subcategoria->SubCat_vDescripcion." [Cta: ".$obj_subcategoria->Cta_cGlobal." ".$obj_subcategoria->Cta_vDescripcion."]";
  $val_linsol_uexpl = $obj_lineasolicitud->Lin_UExp_nIdUnExp;
  $val_linsol_dpto = $obj_lineasolicitud->Lin_Dpto_nIdDpto;
  $val_linsol_proyecto = $obj_lineasolicitud->Lin_Proy_nIdProyecto;

  $lista_uexpl = UExplData::getUExplAllActive();
  $lista_dpto = DptoData::getDptoAllActive();
  $lista_proyecto = ProyectoData::getProyectoAllActive();
?>

<!-- <form class="needs-validation was-validated" id="form_lineasol_edit_step1"> -->
  <div class="row mb-1 form-group">
    <div class="col-sm-2">
        <label for="txt_linsol_edit_linea" class="">Linea</label>
        <input type="number" min=0 max=50 class="form-control" name="txt_linsol_edit_linea" id="txt_linsol_edit_linea" value="<?php echo $obj_lineasolicitud->Lin_nNroLinea;?>" required>
    </div>
    <div class="col-sm-10">
        <label for="txt_linsol_edit_descr" class="">Descripción</label>
        <input type="text" class="form-control" name="txt_linsol_edit_descr" id="txt_linsol_edit_descr"  maxlength="80" value="<?php echo $obj_lineasolicitud->Lin_vDescripcion;?>" required>
    </div>
  </div>

  <div class="row mb-1 form-group">
    <div class="col-sm-2">
       <label for="txt_linsol_edit_cant" class="">Cantidad</label>
        <input name="txt_linsol_edit_cant" id="txt_linsol_edit_cant" type="number" min=0 class="form-control" maxlength="5" value="<?php echo $obj_lineasolicitud->Lin_nCantidad;?>" required>
    </div>
    <div class="col-sm-10">
        <label for="txt_linsol_edit_subcat" class="">Sub Categoria</label>
        <input type="text" class="form-control" name="txt_linsol_edit_subcat" id="txt_linsol_edit_subcat"  maxlength="40" value="<?php echo $val_linsol_subcat;?>" required>
        
        <input name="txt_linsol_edit_subcat_data" id="txt_linsol_edit_subcat_data" value="<?php echo $obj_lineasolicitud->Lin_SubCat_nIdSubCategoria;?>" type="hidden" >
    </div>

  </div>

  <div class="row mb-1 form-group">
    <div class="col-sm-2">
        <label for="sel_linsol_edit_uexpl" class="">U. Expl.</label>
        <select name="sel_linsol_edit_uexpl" id="sel_linsol_edit_uexpl" class="form-control" required>
        <?php
            foreach ($lista_uexpl as $row_uexpl) {
              $temp_selected_uexpl = ($val_linsol_uexpl==$row_uexpl->UExp_nIdUnExp?"selected":"");
        ?>
            <option value="<?php echo $row_uexpl->UExp_nIdUnExp;?>" <?php echo $temp_selected_uexpl;?> ><?php echo $row_uexpl->UExp_cUnidadExp;?></option>
        <?php
                
            }
        ?>
        </select>
    </div>

    <div class="col-sm-2">
        <label for="sel_linsol_edit_proyecto" class="">Proyecto</label>
        <select name="sel_linsol_edit_proyecto" id="sel_linsol_edit_proyecto" class="form-control" required>
        <?php
            foreach ($lista_proyecto as $row_proyecto) {
              $temp_selected_proy = ($val_linsol_proyecto==$row_proyecto->Proy_nIdProyecto?"selected":"");
        ?>
            <option value="<?php echo $row_proyecto->Proy_nIdProyecto;?>" <?php echo $temp_selected_proy;?> ><?php echo $row_proyecto->Proy_vProyecto;?></option>
        <?php
                
            }
        ?>
        </select>
    </div>
    
    <div class="col-sm-2">
        <label for="sel_linsol_edit_dpto" class="">Dpto.</label>
        <select name="sel_linsol_edit_dpto" id="sel_linsol_edit_dpto" xid="<?php echo $val_linsol_dpto;?>" class="form-control" required>
        </select>
    </div>



    <div class="col-sm-2">
       <label for="txt_linsol_edit_subtotal" class="">SubTotal</label>
       <input name="txt_linsol_edit_subtotal" id="txt_linsol_edit_subtotal" type="text" class="form-control" maxlength="10" value="<?php echo $obj_lineasolicitud->Lin_dSubtotal;?>" required>

    </div>

    <div class="col-sm-2">
        <label for="sel_linsol_edit_igv" class="">IGV</label>
        <select name="sel_linsol_edit_igv" id="sel_linsol_edit_igv" class="form-control">
            <option value="1">18%</option>
            <option value="0">0%</option>
        </select>
    </div>

    <div class="col-sm-2">
        <label for="txt_linsol_edit_total" class=""> TOTAL</label>
        <input name="txt_linsol_edit_total" id="txt_linsol_edit_total" type="text" class="form-control" maxlength="10" disabled value="<?php echo $obj_lineasolicitud->Lin_dTotal;?>" required>
    </div>
  </div>

  
<!-- </form> -->

