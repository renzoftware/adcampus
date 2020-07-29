<?php
   $var_uexpl = $_POST["sel_uexpl"];
   $var_proyecto = $_POST["sel_proyecto"];
   $var_dpto = $_POST["sel_dpto"];
   $var_lin_estado = $_POST["lin_estado"];

  if($var_uexpl!="" && $var_proyecto!="" && $var_dpto!="" && $var_lin_estado && "" ){
   $result_lineas_oc_pend = LineaSolicitudData::getLinOCPendBy_Uexp_Proyecto_Estado($var_uexpl, $var_proyecto, $var_dpto, $var_lin_estado);
  }
  else{
    echo "0";
    exit();
  }

?>

<table class="align-middle mb-0 table table-borderless table-striped table-hover">
   <thead>
      <tr>
         <th class="text-center">#</th>
         <th class="text-center">OC</th>
         <th class="text-center">Solic</th>
         <th class="text-center">Linea</th>
         <th>Descripción</th>
         <th class="text-center">MON</th>
         <th class="text-center">Total</th>
         <th class="text-center">Estado</th>
      </tr>
   </thead>
   
   <tbody>
      <?php
         if(count($result_lineas_oc_pend)<=0){
            echo "<tr class=\"table-light cat\"><td colspan=\"8\">No se encontraron datos. </td></tr>";
            exit();
         }

         $i = 0;
         foreach ($result_lineas_oc_pend as $row_linea_oc_pend) {
            $i++;
            $txt_sol_tipomoneda = ($row_linea_oc_pend->Sol_cTipoMoneda==1?"PEN":"<b>USD</b>");
            $txt_sol_tipomoneda_symbol = ($row_linea_oc_pend->Sol_cTipoMoneda==1?"S/.":"$");

            $var_total = number_format($row_linea_oc_pend->Lin_dTotal, 1, '.', ',');

            $var_lineasol_estado = $badge = "";
            switch ($row_linea_oc_pend->Lin_cEstado) {
              case 1: 
                  $var_lineasol_estado = "Ingresado"; 
                  $badge = "badge-info";
                  break;
              case 2: 
                  $var_lineasol_estado = "Aprobado";
                  $badge = "badge-primary";
                  break;
              case 3: 
                  $var_lineasol_estado = "Despachado";
                  $badge = "badge-success";
                  break;
              case 4:
                  $var_lineasol_estado = "Rec. Parcial";
                  $badge = "badge-warning";
                  break;
              case 5:
                  $var_lineasol_estado = "Rec. Total";
                  $badge = "badge-alternate";
                  break;
              case 6:
                  $var_lineasol_estado = "Cancelado";
                  $badge = "badge-dark";
                  break;
            }

      ?>
      <tr>
         <td class="text-center text-muted"><?php echo $i; ?></td>
         <td class="text-center text-muted"><b><?php echo $row_linea_oc_pend->OC_nNroOC; ?></b></td>
         <td class="text-center">
            <div class="widget-content p-0">
               <div class="widget-content-wrapper">
                      <!-- <div class="widget-content-left mr-3">
                          <div class="widget-content-left">
                              <img class="rounded-circle" src="assets/images/avatars/4.jpg" alt="" width="40">
                          </div>
                      </div> -->
                      <div class="widget-content-left flex2">
                          <div class="widget-heading"><?php echo $row_linea_oc_pend->Sol_vNroSolicitud ;?></div>
                          <div class="widget-subheading opacity-7"> <?php echo $row_linea_oc_pend->Dpto_cDpto ;?></div>
                      </div>
                  </div>
              </div>
         </td>
            
         <td class="text-center text-muted"><?php echo $row_linea_oc_pend->Lin_nNroLinea; ?></td>
         
         <td>
              <div class="widget-content p-0">
                  <div class="widget-content-wrapper">
                      <!-- <div class="widget-content-left mr-3">
                          <div class="widget-content-left">
                              <img class="rounded-circle" src="assets/images/avatars/4.jpg" alt="" width="40">
                          </div>
                      </div> -->
                      <div class="widget-content-left flex2">
                          <div class="widget-heading"><?php echo $row_linea_oc_pend->Lin_vDescripcion ;?></div>
                          <div class="widget-subheading opacity-7"> <?php echo $row_linea_oc_pend->Prov_vNombreProveedor ;?></div>
                      </div>
                  </div>
              </div>
          </td>
          <td class="text-center"><?php echo $txt_sol_tipomoneda ;?></td>
          <td class="text-right"><?php echo $var_total;?></td>
          <td class="text-center">
              <div class="badge <?php echo $badge;?> "><?php echo $var_lineasol_estado; ?></div>
          </td>
          <!-- <td class="text-center">
              <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
          </td> -->
      </tr>
      <?php
         }
      ?>
      

   </tbody>
</table>
