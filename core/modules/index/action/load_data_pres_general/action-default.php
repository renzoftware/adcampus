<?php
  $var_proyecto = $_POST["sel_proyecto"];
  $var_uexpl = $_POST["sel_uexpl"];
  $var_dpto = $_POST["sel_dpto"];
?>
<style type="text/css">
   .toggler{
      cursor: pointer 
   }
   .cta-presup,
   .cta-real{
      cursor: pointer;
   }
   .det-subcat{
      cursor: pointer;
   }

</style>
<table id="table_prueba" class="table table-bordered table-responsive dt-responsive nowrap tablecat" data-pattern="priority-columns" cellspacing="0" width="100%">
  <thead>
      <tr>
         <th class="text-left" data-priority="1">Cuenta/SubCategoria</th>
         <th class="text-center" width="60px">ENE</th>
         <th class="text-center" width="60px">FEB</th>
         <th class="text-center" width="60px">MAR</th>
         <th class="text-center" width="60px">Q1</th>
         <th class="text-center" width="60px">ABR</th>
         <th class="text-center" width="60px">MAY</th>
         <th class="text-center" width="60px">JUN</th>
         <th class="text-center" width="60px">Q2</th>
         <th class="text-center" width="60px">JUL</th>
         <th class="text-center" width="60px">AGO</th>
         <th class="text-center" width="60px">SET</th>
         <th class="text-center" width="60px">Q3</th>
         <th class="text-center" width="60px">OCT</th>
         <th class="text-center" width="60px">NOV</th>
         <th class="text-center" width="60px">DIC</th>
         <th class="text-center" width="60px">Q4</th>
         <th class="text-center" data-priority="2">TOTAL</th>
      </tr>
   </thead>

   <tbody>
<?php
   if((is_null($var_proyecto) || $var_proyecto == "") || (is_null($var_uexpl) || $var_uexpl == "") || (is_null($var_dpto) ||$var_dpto == "")){
      echo "<tr class=\"table-light cat\"><td colspan=\"14\">Hubo un error en la selección. </td></tr>";
      exit();
   }

   $result_group_cuentas = LineaSolicitudData::getLinSolGroupCuentaByProyectoAndUexpAndDpto($var_proyecto, $var_uexpl, $var_dpto); 

   $arr_sum_cuenta_mes_total = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0, 11=>0, 12=>0);
   $var_sum_trimestre_total = 0;
   
   foreach ($result_group_cuentas as $row_group_cuenta) {
      $var_sum_cuenta = 0;
      $var_cuenta_id = $row_group_cuenta->Cta_nIdCuenta;

      /* Buscamos presupuesto por unidad/proyecto/dpto */
      $temp_row_dptoproy = DptoProyectoData::getDptoProyBy_Proy_Dpto($var_proyecto, $var_dpto);
      $var_DptoProy = 0;
                             
      if(is_null($temp_row_dptoproy->DptoProy_nIdDptoProyecto)){
          $var_DptoProy = 0;
      }
      else{
          $var_DptoProy = $temp_row_dptoproy->DptoProy_nIdDptoProyecto;
      }

   ?>
      <!-- FILA CUENTA -->
      <tr class="table-light toggler cat" data-prod-cat="<?php echo $var_cuenta_id;?>">

         <!-- Celda para Nombre de la Cuenta -->
         <td class="text-left"  data-priority="1">
            <b><i class="fa fa-plus-circle"></i>
      <?php
         echo $row_group_cuenta->Cta_cGlobal. " " .$row_group_cuenta->Cta_vDescripcion;
      ?>
            </b>
         </td>
           
      <?php
         $arr_cuenta_monto_mes = array( 1=>$row_group_cuenta->ene, 2=>$row_group_cuenta->feb, 3=>$row_group_cuenta->mar, 4=>$row_group_cuenta->abr, 5=>$row_group_cuenta->may, 6=>$row_group_cuenta->jun, 7=>$row_group_cuenta->jul, 8=>$row_group_cuenta->ago, 9=>$row_group_cuenta->sept, 10=>$row_group_cuenta->oct, 11=>$row_group_cuenta->nov, 12=>$row_group_cuenta->dic );
         $var_sum_trimestre_cta = 0;
         $var_sum_trimestre_subcat = 0;
         // $var_sum_cuenta = 0;

         /* Mostrar los montos de Enero a Diciembre de las CUENTAS*/
         for ($i=1; $i<=12; $i++) {
            $var_sum_trimestre_cta += $arr_cuenta_monto_mes[$i];
      ?>
         <!-- Celda Muestra Monto Real/Presupuesto de la cuenta en el Mes -->
         <td class="text-right">
         <?php
            $result_busca_presupuesto = PresupuestoData::getPresupBy_UExp_DptoProy_Cta_Mes($var_uexpl, $var_DptoProy, $var_cuenta_id, $i);
            $var_sum_cuenta += $arr_cuenta_monto_mes[$i];
            $arr_sum_cuenta_mes_total[$i] += $arr_cuenta_monto_mes[$i];
            $temp_var_budget = "";
            if (is_null($result_busca_presupuesto)){
               echo "<div class=\"mb-0 mr-0 text-info cta-presup\"><b>N.P.</b></div>";
               $css_presup_mes = "";
               $temp_var_budget = "N.P.";
            }
            else{
               $css_presup_mes = ($result_busca_presupuesto->Pres_nMonto<$arr_cuenta_monto_mes[$i])?"text-danger":"";
               $temp_var_budget = number_format($result_busca_presupuesto->Pres_nMonto, 0, '.', ','); 
         ?>
               <div class="mb-0 mr-0 text-info cta-presup" >
                  <b><?php echo $temp_var_budget; ?></span></b>
               </div>
         <?php
            }
         ?>
            <div class="cta-real <?php echo $css_presup_mes; ?>">
               <b><span data-toggle="tooltip" title="Budget: <?php echo $temp_var_budget; ?>" data-placement="top"><?php echo number_format($arr_cuenta_monto_mes[$i], 0, '.', ','); ?></span></b>
            </div>    
         </td>
         
         <?php
            if($i%3==0){
         ?>
         <td class="text-right">
            <div>
               <b><?php echo number_format($var_sum_trimestre_cta, 0, '.', ','); ?></b>
            </div>
         </td>
         <?php
               $var_sum_trimestre_cta = 0;
            }
         }
         ?>

         <!-- Celda Muestra Suma Total de Cuenta -->
         <td class="text-right">
         <?php
            echo number_format($var_sum_cuenta, 0, '.', ',');
         ?>    
         </td>
      </tr>

       <!-- FILAS SUBCATEGORIAS DE LA CUENTA -->
       <?php
         $result_group_subcat = LineaSolicitudData::getSumLinSolGroupSubCatByProyectoAndUexpAndDptoAndCta($var_proyecto, $var_uexpl, $var_dpto, $row_group_cuenta->Cta_nIdCuenta );
         foreach ($result_group_subcat as $row_subcat) {
         ?>
            <tr class="subcat cat<?php echo $var_cuenta_id;?>">
             <!-- Descripcion de la SubCategoria -->
               <td class="text-right " data-priority="1">
                  <div class="" style="max-width: 250px; float:right;">
                  <?php
                    echo $row_subcat->SubCat_vDescripcion;
                  ?>   
                  </div> 
               </td>
               <?php
                  $arr_subcat_monto_mes = array( 1=>$row_subcat->ene, 2=>$row_subcat->feb, 3=>$row_subcat->mar, 4=>$row_subcat->abr, 5=>$row_subcat->may, 6=>$row_subcat->jun, 7=>$row_subcat->jul, 8=>$row_subcat->ago, 9=>$row_subcat->sept, 10=>$row_subcat->oct, 11=>$row_subcat->nov, 12=>$row_subcat->dic );

               /* Mostrar los montos de Enero a Diciembre de las subcategoria*/
               for ($i=1; $i<=12; $i++) {
                  $var_sum_trimestre_subcat += $arr_subcat_monto_mes[$i];
               ?>
               <td class="text-right" >
                  <div class="det-subcat" data-xid="<?php echo $row_subcat->SubCat_nIdSubCategoria;?>" data-mes="<?php echo $i; ?>">
               <?php
                  echo number_format($arr_subcat_monto_mes[$i], 0, '.', ',');
               ?>    
                  </div>
               </td>

               <!-- CELDA PARA MONTO SUBCATEGORIA POR TRIMESTRE -->
               <?php
                  if($i%3==0){
               ?>
               <td class="text-right">
                  <div>
                     <?php echo number_format($var_sum_trimestre_subcat, 0, '.', ','); ?>
                  </div>
               </td>
               <?php
                     $var_sum_trimestre_subcat = 0;
                  }
               }
               ?>

               <!-- Mostrar el monto total ANUAL de la subcategoria -->
               <td class="text-right">
               <?php
                  echo number_format($row_subcat->sum2, 0, '.', ',');
               ?>    
               </td>
            </tr>
      <?php
         }
       }
     ?>
       <!-- FILA TOTAL DEL MES -->
      <tr class="table-light cat1">
         <td class="text-center toggler" data-prod-cat="2" data-priority="1">
            <b>
               TOTAL MES
            </b>
         </td>
         
         <?php
            $var_sum_total = 0;
            for ($i=1; $i<=12; $i++) {
               $var_sum_total += $arr_sum_cuenta_mes_total[$i];
               $var_sum_trimestre_total += $arr_sum_cuenta_mes_total[$i];
         ?>
         <td class="text-right">
            <b>
               <?php echo number_format($arr_sum_cuenta_mes_total[$i], 0, '.', ',');?>
            </b>
         </td>

         <!-- CELDA PARA MONTO TOTAL POR TRIMESTRE -->
         <?php
               if($i%3==0){
         ?>
         <td class="text-right">
            <div>
               <b><?php echo number_format($var_sum_trimestre_total, 0, '.', ','); ?></b>
            </div>
         </td>
         <?php
                  $var_sum_trimestre_total = 0;
               }
            }
         ?>
         
         <!-- Celda MONTO TOTAL ANUAL  -->  
         <td class="text-right">
            <b>
               <?php echo number_format($var_sum_total, 0, '.', ',');?>
            </b>
         </td>


      </tr>
   </tbody>
</table>