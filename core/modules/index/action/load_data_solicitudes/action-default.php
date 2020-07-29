<?php
  $opt = $_POST['opt'];

  // Prepare array
  $mysql_data = array();
  $data = array();
  $row_count_query = 0;

  switch($opt) {
    case "load01":
      $params =  array();
      $params = $_REQUEST;

      $result_solicitudes = SolicitudData::getSolicitudAllActive_params($params);
      if(count($result_solicitudes)<=0){
        $result  = 'error';
        $message = 'query error';
      }
      else{
        $result  = 'success';
        $message = 'query success';

        $result_solicitudes_total = SolicitudData::getTotalSolicitudes($params);
        $row_count_query = $result_solicitudes_total->total;
        foreach($result_solicitudes as $row_solicitud) {
          $idsolicitud = $row_solicitud->Sol_nIdSolicitud;
          $transf = strtotime($row_solicitud->Sol_dFechaCreacion);    
          $date = date("d/m", $transf);

          $obj_solicitud = SolicitudData::getSolicitudByIdSolicitud($idsolicitud);
          $var_estadosol = $estadosol = $badge = "";
          
          switch ($obj_solicitud->Sol_cEstadoSol) {
              case 1: 
                  $estadosol = "Ingresado"; 
                  $badge = "badge-info";
                  break;
              case 2: 
                  $estadosol = "Aprobado";
                  $badge = "badge-primary";
                  break;
              case 3: 
                  $estadosol = "Despachado";
                  $badge = "badge-success";
                  break;
              case 4:
                  $estadosol = "Rec. Parcial";
                  $badge = "badge-warning";
                  break;
              case 5:
                  $estadosol = "Rec. Total";
                  $badge = "badge-alternate";
                  break;
              case 6:
                  $estadosol = "Canc/Recha";
                  $badge = "badge-dark";
                  break;
              case 7:
                  $estadosol = "Sin Lineas";
                  $badge = "badge-secondary";
                  break;
              default: 
                  $estadosol = "";
                  break;
          }

          $value_estado = "<center><div class=\"badge {$badge}\"> {$estadosol} </div></center>";
          $value_accion = "<button type=\"button\" style=\" padding-top: 0rem; padding-bottom: 0rem;\" class=\"btn function_lineas\" data-id=\"{$idsolicitud}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver Detalle\"><i class=\"fa fa-bars\"></i></button>";

          $temp_row_linsol = LineaSolicitudData::getMontoTotalSolByIdSolicitud($idsolicitud);
          $temp_var_montototal = "0.0";
          if(is_null($temp_row_linsol)){
              $temp_var_montototal = "0.0";
          }
          else{
              $temp_var_montototal = (is_null($temp_row_linsol->monto_total)?"0.0":$temp_row_linsol->monto_total);
          }

          /*
          COLUMNAS DATATABLE
          0: Nro Solicitud
          1: Descripcion
          2: Moneda
          3: Fecha Registro
          4: Estado
          5: Acción
          */

          $data[] = array(
            "0" =>  $row_solicitud->Sol_vNroSolicitud,
            "1" =>  $row_solicitud->Sol_vDescripcionSol,
            "2" =>  "<div style=\"text-align: right;\">".number_format($temp_var_montototal, 1, '.', ',')."</div>",
            "3" => "<center>".$row_solicitud->moneda."</center>",
            "4" => "<center>".$date."</center>",
            "5" => $value_estado,
            "6" => $value_accion
          );
        }
      }
    break;

    default:
    break;
  }

  $json_data = array(
    "draw"            => intval( $params['draw'] ),     
    "recordsTotal"    => $row_count_query,
    "recordsFiltered" => $row_count_query,
    "data"            => $data   // total data array
  );

  echo json_encode($json_data);  // send data as json format
?>