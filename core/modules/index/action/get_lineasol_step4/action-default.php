<?php
  $sess_linsol_id_temp = $_SESSION["linsol_id_temp"];
  $obj_lineasolicitud = LineaSolicitudData::getLineaSolicitudByIdLineaSolicitud($sess_linsol_id_temp);
  /* Obtener tipo de moneda*/
  $obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($obj_lineasolicitud->Lin_Sol_nIdSolicitud);
  $var_sol_tipomon = $obj_solicitud->Sol_cTipoMoneda==1?"S/. ":"$ ";


  $result_lista_recepciones = RecepcionesData::getRecepcionesByIdLineaSol($sess_linsol_id_temp);
  $result_suma_cant = RecepcionesData::getRecepSumCantMonto($sess_linsol_id_temp);

  $tipo_recep = (is_null($obj_lineasolicitud->Lin_cTipoRecepcion)?"1":$obj_lineasolicitud->Lin_cTipoRecepcion);

  $var_recep_recibido = $var_recep_pendiente = 0;
  $var_recep_cantidad = ($tipo_recep==1?$obj_lineasolicitud->Lin_nCantidad:$obj_lineasolicitud->Lin_dTotal);
  
  if(count($result_lista_recepciones)>0){
    /* Obtenemos suma de montos/cantidades recepcionados */
    if(is_null($result_suma_cant->cant_total)){
      $var_recep_pendiente = $var_recep_cantidad;
    }
    else{
      $var_recep_recibido = $result_suma_cant->cant_total;
      $var_recep_pendiente = $var_recep_cantidad - $var_recep_recibido;
    }
  }
  else{
      $var_recep_pendiente = $var_recep_cantidad;
  }

  $var_enabled = ((int)$var_recep_pendiente==0)?"disabled":"";

  if(is_null($obj_lineasolicitud->Lin_OC_nIdOrdenCompra)){
    echo "<div>Línea no cuenta con OC asignada. Verificar fase 3.</div>";
    exit();
  }
  $obj_OC = OrdenCompraData::getOCByIdOc($obj_lineasolicitud->Lin_OC_nIdOrdenCompra);
?>
  <nav class="" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <b>OC:</b>&nbsp;<?php echo $obj_OC->OC_nNroOC ; ?>&nbsp;&nbsp;
      <?php 
        // echo var_dump($result_suma_cant->cant_total);
        if($tipo_recep==1){ /* CANTIDAD */
      ?>  
          <li class="breadcrumb-item">
            <b>CANT. TOTAL: </b><?php echo $var_recep_cantidad; ?>
          </li>
          <li class="breadcrumb-item"><b>RECIBIDO: </b><?php echo round($var_recep_recibido); ?></li>
          <li class="breadcrumb-item"><b>PENDIENTE:</b> <?php echo $var_recep_pendiente; ?></li>
      <?php
        }
        else{ /* MONTO */
      ?>
          <li class="breadcrumb-item"><b>MONTO TOTAL: </b>
            <?php 
              // echo $var_recep_cantidad; 
              echo $var_sol_tipomon ." ". number_format($var_recep_cantidad, 2);
            ?>
          </li>
          <li class="breadcrumb-item"><b>RECIBIDO: </b>
            <!-- <?php echo $var_recep_recibido; ?> -->
            <?php 
              // echo $var_recep_cantidad; 
              echo $var_sol_tipomon ." ". number_format($var_recep_recibido, 2);
            ?>
          </li>
          <li class="breadcrumb-item"><b>PENDIENTE:</b>
            <!-- <?php echo $var_recep_pendiente; ?> -->
            <?php 
              // echo $var_recep_cantidad; 
              echo $var_sol_tipomon ." ". number_format($var_recep_pendiente, 2);
            ?>
          </li>
      <?php

        }
      ?>
    </ol>
  </nav>

  <div class="row mb-3 form-group">
    <div class="col-sm-3">
      <label for="sel_linsol_edit_tiporecep" class="">Tipo Recepcion</label>
      <select name="sel_linsol_edit_tiporecep" id="sel_linsol_edit_tiporecep" class="form-control" required <?php echo $var_enabled;?> >
        <option value="1" <?php echo ($tipo_recep==1)?"selected":"" ;?> >CANTIDAD</option>
        <option value="2" <?php echo ($tipo_recep==2)?"selected":"" ;?> >MONTO</option>
      </select>
    </div>

    <div class="col-sm-3">
      <label for="txt_recep_add_cant_recib" class="">Recibido</label>
      <input type="number" min=1 class="form-control" name="txt_recep_add_cant_recib" id="txt_recep_add_cant_recib" step="any"  maxlength="40" oninvalid="this.setCustomValidity('Ingresar Cantidad')" oninput="setCustomValidity('')" required <?php echo $var_enabled;?> >
    </div>

    <div class="col-sm-3">
      <label for="date_recep_add_fcontable" class="">Fecha Contable</label>
      <input name="date_recep_add_fcontable" id="date_recep_add_fcontable" type="text" class="form-control" oninvalid="this.setCustomValidity('Seleccionar Fecha')" oninput="setCustomValidity('')" required <?php echo $var_enabled;?> />
    </div>
  </div>
  
  <div class="row mb-3 form-group scroll-area-sm" style="height: 150px"> 
    <div class="table-responsive pl-5 pr-5">
      <table class="align-middle mb-0 table table-border table-striped table-hover" id="tbl_linea_sol_recepcion" >
        <thead>
          <tr>
              <th class="text-center">#</th>
              <th class="text-center"><?php echo ($tipo_recep==1)?"CANTIDAD":"MONTO"; ?> </th>
              <th class="text-center">Fecha Contable</th>
              <th class="text-center">*</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if(count($result_lista_recepciones)<=0){
              echo '<tr><td colspan="4">No se encontraron recepciones.</td></tr>';
            }
            else{
              $cont = 0;
              foreach ($result_lista_recepciones as $row_recepcion) {
                $cont++;

          ?>
            <tr>
              <td class="text-center"><?php echo $cont; ?></td>
              <td class="text-center">
                <?php 
                if($obj_lineasolicitud->Lin_cTipoRecepcion ==1){
                  echo number_format($row_recepcion->Rec_nCantRecibida, 0);
                }
                else{
                  echo $var_sol_tipomon." ".number_format($row_recepcion->Rec_nCantRecibida, 2);
                }
                ?>  
              </td>
              <td class="text-center"><?php echo $row_recepcion->Rec_dFechaContable; ?></td>
              <td class="text-center">
                <button class="btn-icon btn-icon-only btn btn-outline-danger func_delete_recep" data-xid="<?php echo $row_recepcion->Rec_nIdRecepcion; ?>" type="button" ><i class="pe-7s-trash btn-icon-wrapper"> </i>Eliminar</button>
              </td>
            </tr>
          <?php
              }
            }
          ?> 
        </tbody>
      </table>
    </div>
  </div>