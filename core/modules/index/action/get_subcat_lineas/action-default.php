<?php
   $mes_val = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
   
   $var_idsubcat = $_POST["subcat_id"];
   $obj_subcategoria = SubCategoriaData::getSubCategoriaByIdSubCat($var_idsubcat);
   
   $var_proyecto = $_POST["sel_proyecto"];
   $var_uexpl = $_POST["sel_uexpl"];
   $var_dpto = $_POST["sel_dpto"];
   $var_mes = $_POST["mes"];

   $result_lineas_subcat = LineaSolicitudData::getDetalleLinSolBy_Proyecto_Uexp_Dpto_Subcat_Mes($var_proyecto, $var_uexpl, $var_dpto, $var_idsubcat, $var_mes);
?>
<style type="text/css">
   .scroll-area-sm{
      height:calc(100% - 50px);
   }
   .iwt{
      display:block;
   }
</style>


<div class="theme-settings__inner ">
   <div class="scrollbar-container ps ps--active-y">
      <div class="theme-settings__options-wrapper scroll-area-sm" >
         <h3 class="themeoptions-heading">
            <b><?php echo $obj_subcategoria->SubCat_vSubCategoria. "<br>" . $obj_subcategoria->SubCat_vDescripcion; ?></b>
         </h3>

         <div class="card-body pt-1">
            <h5 class="card-title">
               <span class="iwt pt-2">
                  <i class="fa fa-fw" aria-hidden="true" title="Copy to use calendar"></i>
                  <span><?php echo $mes_val[$var_mes-1]; ?> </span>
               </span>

               
                 
            </h5>
            <table class="mb-0 table table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Descripción</th>
                     <th align="center">OC</th>
                     <th>S/.</th>
                  </tr>
               </thead>
               
               <tbody>
               <?php
                  $i = $sum_total = 0;
                  if(count($result_lineas_subcat)>0){
                     foreach ($result_lineas_subcat as $row_linea_subcat) {
                     $i++;
                     $var_total = (is_null($row_linea_subcat->total)?0:$row_linea_subcat->total);
                     $sum_total += $var_total;
                  ?>
                  <tr>
                     <!-- Nro Fila -->
                     <th scope="row"><?php echo $i; ?></th>

                     <!-- Descripcion -->
                     <td>
                     <?php
                        echo $row_linea_subcat->Lin_vDescripcion;
                     ?>
                     </td>

                     <!-- OC -->
                     <td align="center">
                     <?php
                        echo $row_linea_subcat->OC_nNroOC;
                     ?>
                     </td>

                     <!-- TOTAL -->
                     <td align="right">
                     <?php
                        echo number_format($var_total, 1, '.', ',');
                     ?>
                     </td>
                 </tr>
               <?php
                     } 
                  }
                  else{
               ?>
                  <tr>
                     <th scope="row" colspan="4">No se encontraron registros en el mes.</th>
                  </tr>
               <?php
                  }
               ?>

               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="3" align="right"><b>TOTAL</b></td>
                     <td align="right">
                     <?php
                        echo number_format($sum_total, 1, '.', ',');
                     ?>
                     </td>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>

      <h3 class="themeoptions-heading">
         <div>
              <!-- Header Options -->
         </div>
         <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class btn-close-div-detalle" data-class="">
            Cerrar
         </button>
      </h3>
   <!-- <div class="ps__rail-x" style="left: 0px; bottom: -343px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div> -->
   <!-- <div class="ps__rail-y" style="top: 343px; height: 497px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 158px; height: auto;"></div></div> -->
   </div>
</div>

