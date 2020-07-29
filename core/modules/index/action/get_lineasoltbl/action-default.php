<?php
// Get opt (and id)
$opt = '';
$id  = '';
if (isset($_GET['opt'])){
  $opt = $_GET['opt'];
}

// Prepare array
$mysql_data = array();
$data = array();
$row_count_query = 0;

// Valid opt found
if($opt != ''){
  switch($opt) {
    /* Datatable para Gestores - Menu de Cobranza */      
    case "gestor_asignaciones":
      $idcampus = "";

      // initilize all variable
      $params =  array();
      $params = $_REQUEST;
      
      $idsolicitud = $_POST['val_idsol'];
      // $valtipoest = $_POST['sel_tipoest'];
      // $valcontacto = $_POST['sel_contacto'];
      // $valmejorval = $_POST['sel_mejorval'];

      
      
      /* Lista de estudiantes asignados al gestor */
      // $result_doc_est_asignados = CobDocumentoData::getCobDocumentoAllAsignedByAssigned_at($idusuario, $sWhere, $params);
       $result_lineassol = LineaSolicitudData::getLineasSolicitudByIdSolicitud($idsolicitud);
      
      if(count($result_lineassol)<=0){
        $result  = 'error';
        $message = 'query error';
      }
      else{
        $result  = 'success';
        $message = 'query success';

        $cont = 1;

        // $result_total_asignaciones = CobDocumentoData::getTotalAsignacionesByUsuario($idusuario, $sWhere, $params);
         // $result_lineassol = LineaSolicitudData::getLineasSolicitudByIdSolicitud(1);
      
        $row_count_query = count($result_lineassol);

        foreach($result_lineassol as $linea_solicitud) {
          $cont++;
          $transf = strtotime($linea_solicitud->Lin_dFechaAprob);    
          $var_lineasol_fechaaprob = date("d/m", $transf);

          $var_lineasol_estado = "";
          switch ($linea_solicitud->Lin_cEstado) {
              case 1: 
                  $var_lineasol_estado = "Ingresado"; 
                  $badge = "badge-primary";
                  break;
              case 2: 
                  $var_lineasol_estado = "Aprobado";
                  $badge = "badge-info";
                  break;
              case 3: 
                  $var_lineasol_estado = "Despachado";
                  $badge = "badge-warning";
                  break;
              case 4:
                  $var_lineasol_estado = "Rec. Parcial";
                  $badge = "badge-alternate";
                  break;
              case 5:
                  $var_lineasol_estado = "Rec. Total";
                  $badge = "badge-success";
                  break;
              case 6:
                  $var_lineasol_estado = "Rechazado";
                  $badge = "badge-danger";
                  break;
              case 7:
                  $var_lineasol_estado = "Cancelado";
                  $badge = "badge-dark";
                  break;
              default: 
                  $var_lineasol_estado = "";
                  break;
          }

          $var_lineasol_id = $linea_solicitud->Lin_nIdLineaSol;

          // $functions = 
          //   '<center><a class="obj_1" data-option="'.$var_lineasol_id.'" >
          //     <span class="label label-info "><i class="fa fa-phone">&nbsp;&nbsp;</i>
          //     </span>
          //   </a></center>';<div class="badge badge-primary">{$var_lineasol_id}</div>
          
          $fecha_formato = date("d M", strtotime($linea_solicitud->Lin_dFechaAprob));

          $func_fechaAprob = "<a class=\"btn function_lineas2\" data-id=\"1\" data-original-title=\"Ver Lineas\">*".$fecha_formato."</a>" ;
            
          $data[] = array(
            "0" => $linea_solicitud->Lin_nNroLinea,
            "1" => $linea_solicitud->SubCat_vSubCategoria,
            "2" => $linea_solicitud->Cta_cGlobal,
            "3" => $linea_solicitud->UExp_cUnidadExp,
            "4" => $linea_solicitud->Dpto_cDpto,
            "5" => $linea_solicitud->Lin_vDescripcion,
            "6" => $linea_solicitud->Lin_nCantidad,
            "7" => $linea_solicitud->Lin_dSubtotal,
            "8" => $linea_solicitud->Lin_dIGV, 
            "9" => $linea_solicitud->Lin_dTotal, 
            "10" => $func_fechaAprob,
            "11" => "1", 
            "12" => "1"
          );
        }
      }
      break;

      default:
        break;
    }
}

$json_data = array(
      "draw"            => intval( $params['draw'] ),   
      // "recordsTotal"    => intval( $totalRecords ),  
      "recordsTotal"    => $row_count_query,
      "recordsFiltered" => $row_count_query,  
      // "recordsTotal"    => 100,
      // "recordsFiltered" => 100,  
      "data"            => $data   // total data array
      );

  echo json_encode($json_data);  // send data as json format
?>