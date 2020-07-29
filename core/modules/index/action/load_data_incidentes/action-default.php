<?php
  $u=null;
  if(Session::getUID()!=""){
    $u = UserData::getById(Session::getUID());  
  }
  else{
      echo "<script>window.location='index.php';</script>";
  }

  $opt = $_POST['opt'];

  // Prepare array
  $mysql_data = array();
  $data = array();
  $row_count_query = 0;

  switch($opt) {
    case "load01":
      $params =  array();
      $params = $_REQUEST;

      $result_incidentes = IncidentesData::getIncidentesAllActive_params($params);
      if(count($result_incidentes)<=0){
        // $result  = 'error';
        // $message = 'query error';
      }
      else{

        $result_incidentes_total = IncidentesData::getTotalIncidentes($params);
        $row_count_query = $result_incidentes_total->total;
        $cont = 0;
        foreach($result_incidentes as $row_incidente) {
          $cont++;
          $idincidente = $row_incidente->Inc_nIdIncidente;
          $transf = strtotime($row_incidente->Inc_vFechaReporte);    
          $date_reporte = date("d/m", $transf);
          
          if (is_null($row_incidente->Inc_vFechaSolucion)){
            $date_solucion = "-";
          } 
          else{
            $transf = strtotime($row_incidente->Inc_vFechaSolucion);    
            $date_solucion = date("d/m", $transf);
          }

          $estado_incidente = $badge_estado_inc = "";
          switch ($row_incidente->Inc_cEstadoAtencion) {
            case 1: 
              $estado_incidente = "Pendiente"; 
              $badge_estado_inc = "badge-info";
              break;

            case 2: 
              $estado_incidente = "En Curso";
              $badge_estado_inc = "badge-primary";
              break;

            case 3: 
              $estado_incidente = "Resuelto";
              $badge_estado_inc = "badge-success";
              break;
          }

          $prioridad_incidente = $badge_prioridad_inc = "";
          switch ($row_incidente->Inc_cPrioridad) {
            case 0: 
              $prioridad_incidente = "Baja"; 
              $badge_prioridad_inc = "badge-success";
              break;

            case 1: 
              $prioridad_incidente = "Media";
              $badge_prioridad_inc = "badge-warning";
              break;

            case 2: 
              $prioridad_incidente = "Alta";
              $badge_prioridad_inc = "badge-danger parpadea";
              break;

            case 3: 
              $prioridad_incidente = "URGENTE";
              $badge_prioridad_inc = "badge-danger";
              break;
          }

          $value_estado_inc = "<center><div class=\"badge {$badge_estado_inc}\"> {$estado_incidente} </div></center>";

          $value_prioridad_inc = "<center><div class=\"badge {$badge_prioridad_inc}\"> {$prioridad_incidente} </div></center>";

          $value_accion = "<button type=\"button\" style=\" padding-top: 0rem; padding-bottom: 0rem;\" class=\"btn function_lineas\" data-id=\"{$idincidente}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver Detalle\"><i class=\"fa fa-bars\"></i></button>";


          $data[] = array(
            "cont" => $row_incidente->Inc_vNroTicket,
            "campus" => $row_incidente->UExp_cSigla,
            "descripcion" => $row_incidente->Inc_vDescripcion,
            "asignado" => "<center>".$row_incidente->name." ".$row_incidente->lastname."</center>",
            "prioridad" => $value_prioridad_inc,
            "freporte" => "<center>".$date_reporte."</center>",
            "fsolucion" => "<center>".$date_solucion."</center>",
            "comentario" => $row_incidente->Inc_vComentario,
            "estado" => $value_estado_inc,
            "accion" => $value_accion
          );
        }
      }
    break;

    case "load02":
      $params =  array();
      $params = $_REQUEST;

      $result_incidentes = IncidentesData::getIncidentesAllActiveByIdGerente_params($params, $u->id);
      if(count($result_incidentes)<=0){
        // $result  = 'error';
        // $message = 'query error';
      }
      else{
        // echo "B";
        // var_dump("YA");
        // $result  = 'success';
        // $message = 'query success';

        $result_incidentes_total = IncidentesData::getTotalIncidentesByIdGerente($params, $u->id);
        $row_count_query = $result_incidentes_total->total;
        $cont = 0;
        foreach($result_incidentes as $row_incidente) {
          $cont++;
          $idincidente = $row_incidente->Inc_nIdIncidente;
          $transf = strtotime($row_incidente->Inc_vFechaReporte);    
          $date_reporte = date("d/m", $transf);
          
          if (is_null($row_incidente->Inc_vFechaSolucion)){
            $date_solucion = "-";
          } 
          else{
            $transf = strtotime($row_incidente->Inc_vFechaSolucion);    
            $date_solucion = date("d/m", $transf);
          }

          $estado_incidente = $badge_estado_inc = "";
          switch ($row_incidente->Inc_cEstadoAtencion) {
            case 1: 
              $estado_incidente = "Pendiente"; 
              $badge_estado_inc = "badge-info";
              break;

            case 2: 
              $estado_incidente = "En Curso";
              $badge_estado_inc = "badge-primary";
              break;

            case 3: 
              $estado_incidente = "Resuelto";
              $badge_estado_inc = "badge-success";
              break;
          }

          $prioridad_incidente = $badge_prioridad_inc = "";
          switch ($row_incidente->Inc_cPrioridad) {
            case 0: 
              $prioridad_incidente = "Baja"; 
              $badge_prioridad_inc = "badge-success";
              break;

            case 1: 
              $prioridad_incidente = "Media";
              $badge_prioridad_inc = "badge-warning";
              break;

            case 2: 
              $prioridad_incidente = "Alta";
              $badge_prioridad_inc = "badge-danger parpadea";
              break;

            case 3: 
              $prioridad_incidente = "URGENTE";
              $badge_prioridad_inc = "badge-danger";
              break;
          }

          $value_estado_inc = "<center><div class=\"badge {$badge_estado_inc}\"> {$estado_incidente} </div></center>";

          $value_prioridad_inc = "<center><div class=\"badge {$badge_prioridad_inc}\"> {$prioridad_incidente} </div></center>";

          $value_accion = "<button type=\"button\" style=\" padding-top: 0rem; padding-bottom: 0rem;\" class=\"btn function_lineas\" data-id=\"{$idincidente}\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ver Detalle\"><i class=\"fa fa-bars\"></i></button>";


          $data[] = array(
            "cont" => $row_incidente->Inc_vNroTicket,
            "campus" => $row_incidente->UExp_cSigla,
            "descripcion" => $row_incidente->Inc_vDescripcion,
            "asignado" => "<center>".$row_incidente->name." ".$row_incidente->lastname."</center>",
            "prioridad" => $value_prioridad_inc,
            "freporte" => "<center>".$date_reporte."</center>",
            "fsolucion" => "<center>".$date_solucion."</center>",
            "comentario" => $row_incidente->Inc_vComentario,
            "estado" => $value_estado_inc,
            "accion" => $value_accion
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