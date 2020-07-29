<?php  
  if(isset($_GET["view"]) && Session::getUID()){
    ########## INICIO RECURSOS SI USUARIO ESTA LOGEADO ##########
?>
  <?php
    switch ($_GET["view"]) {
      case 'home':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Inicio ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
            
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        </head>

  <?php
        break;

      case 'presupuesto':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Presupuesto ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />
          
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        </head>

  <?php
        break;

      case 'solicitudes':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Solicitudes ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />
          
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'incidentes':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'incidentesadm':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes (Adm) ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'incidentescam':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes (Adm) ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'incidentesger':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <!-- <link href="../css/main.css" rel="stylesheet"> -->
          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'pmpadm':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes (Adm) ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'serviciosadm':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes (Adm) ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'pmpger':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Tareas e Incidentes ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <!-- <link href="../css/main.css" rel="stylesheet"> -->
          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;


      case 'patencion':
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Atención de Tareas e Incidentes ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />

          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <!-- <link href="../css/main.css" rel="stylesheet"> -->
          <link href="../css/main.8d288f825d8dffbbe55e.css" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

          <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
          
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

          <!--  -->
          <script type="text/javascript" src="../js/stacktable/stacktable.js"></script>
          <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" type="text/css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" type="text/javascript"></script>

          <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
          <script src="../js/jquery-ui-1.12.1.custom/jquery-ui.js" crossorigin="anonymous"></script>

        </head>

  <?php
        break;

      case 'login'
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Login ::.</title>
          <link rel="icon" href="../img/favicon.ico" type="image/ico" />
    
          <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

          <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <?php
        break;

      default:
  ?>
        <!DOCTYPE html>
        <html lang="es-ES">

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>.:: ADC v2.0 - Inicio ::.</title>
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
          <meta name="msapplication-tap-highlight" content="no">

          <link href="../css/main.css" rel="stylesheet">
        </head>
  <?php
        break;
    }

  } ########## FIN RECURSOS SI USUARIO ESTA LOGEADO ##########
  
  else{ ##### Condicionales si Usuario no está logeado
  ?>
  <!DOCTYPE html>
  <html lang="es-ES">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>.:: ADC v2.0 - Login ::.</title>
  <?php
    if(isset($_GET["view"])) { ## Usuario no logeado y accede por vista Login
  ?>
      <link rel="icon" href="../img/favicon.ico" type="image/ico" />
      
      <!-- Custom fonts for this template-->
      <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- Custom styles for this template-->
      <link href="../css/sb-admin-2.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <?php
    }
    else{ ## Usuario no logeado y acceso sin vista
  ?>
      <link rel="icon" href="img/favicon.ico" type="image/ico" />

      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <?php
    }
  }
?>
    
  
  </head>

<?php 
  /* INICIO Clase del BODY dependiendo la pagina de carga (Logeo o Pagina de Vista */
  if(Session::getUID()){
    $u = UserData::getById(Session::getUID());
    $user = $u->name." ".$u->lastname;
    $body_class = "";
    
    $body_id ="page-top";
    $sidebar_opt = "closed-sidebar-mobile closed-sidebar";

  }
  else{
    $body_class = "";
  }
  /* FIN Clase del BODY dependiendo la pagina de carga (Logeo o Pagina de Vista */
?>
  <body class="<?php echo $body_class;?>" id="<?php echo $body_id;?>">
    <!-- CSS Adicional para todas las vistas -->
    <style type="text/css">
      /* CSS adicional menu horizontal */
      .hamburger-inner,
      .hamburger-inner::before,
      .hamburger-inner::after{
        background-color: #343a40 !important;
      }

      /* CSS adicional menu vertical */
      .fixed-header .app-header {
          z-index: 20;
      }

      /* CSS INICIO page-loader */
      #page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        background: #FFF none repeat scroll 0% 0%;
        z-index: 99999;
      }
      #page-loader .preloader-interior {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #3498db;
     
        -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
              animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
      }
      #page-loader .preloader-interior:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;
     
        -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
      }
      #page-loader .preloader-interior:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;
     
        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
          animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
      }
      @-webkit-keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
      }
      @keyframes spin {
        0%   { 
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
      }
      /* CSS FIN page-loader */


      /* CSS APP-DRAWER-WRAPPER */
      /*Extra small devices (portrait phones, less than 576px)*/
      @media (max-width: 575.98px) { 
        .app-drawer-wrapper{
          width: 90%;
          right: -90%;
        }
      }
      /*Small devices (landscape phones, 576px and up)*/
      @media (min-width: 576px) and (max-width: 767.98px) { ... }
      /*Medium devices (tablets, 768px and up)*/
      @media (min-width: 768px) and (max-width: 991.98px) { ... }
      /*Large devices (desktops, 992px and up)*/
      @media (min-width: 992px) and (max-width: 1199.98px) { 
        .app-drawer-wrapper{
          width: 50%;
          right: -50%;
        }
      }
      /*Extra large devices (large desktops, 1200px and up)*/
      @media (min-width: 1200px) {
        .app-drawer-wrapper{
          width: 50%;
          right: -50%;
        }
      }
    </style>

    <!-- DIV page-loader  -->
    <div id="page-loader"><span class="preloader-interior"></span></div>

    <?php
        if(isset($_GET["view"]) && Session::getUID()) {
          /* Si existe vista y usuario está logeado, cargar menu y vistas*/
    ?>  
          <!-- Begin Page Content -->
          <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header <?php echo $sidebar_opt;?>">
            <div class="app-header header-shadow bg-warning header-text-dark">
              <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                  <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic is-active" data-class="closed-sidebar">
                      <span class="hamburger-box">
                        <span class="hamburger-inner" ></span>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
              
              <div class="app-header__mobile-menu">
                <div>
                  <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box" >
                      <span class="hamburger-inner" style="background-color: #343a40;" ></span>
                    </span>
                  </button>
                </div>
              </div>

              <div class="app-header__menu">
                <span>
                  <button type="button" class="btn-icon btn-icon-only btn btn-dark btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                      <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                  </button>
                </span>
              </div>
              
              <style type="text/css">
                .popover,
                 .dropdown-menu {
                  left:5% !important;
                  top:20% !important;
                 }

                .app-header .app-header__content.header-mobile-open{
                  width: auto !important; 
                  left:unset !important; 
                  right:5% !important; 
                  top: 50px !important;
                }


              </style>

              <div class="app-header__content" style="">
                <div class="app-header-left" >
                  <ul class="header-menu nav">
                    <li class="nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                          Estadisticas
                      </a>
                    </li>
                    <li class="btn-group nav-item">
                      <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-edit"></i>
                          Tareas
                      </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-link-icon fa fa-cog"></i>
                            Opciones
                        </a>
                    </li>
                  </ul>        
                </div>
                <div class="app-header-right">
                  <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                      <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                          <div class="dropdown">

                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn dropdown-toggle">
                                <img width="42" class="rounded-circle" src="../img/avatars/<?php echo $u->id;?>.jpg" alt="">
                            </a>
                            
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <!-- <div tabindex="-1" class="dropdown-divider"></div> -->
                                <a href="logout" tabindex="0" class="dropdown-item">Salir</a>
                            </div>
                          </div>
                        </div>
                        
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                              <?php echo $user;?>
                            </div>
                            <div class="widget-subheading">
                                UPNT - 2020
                            </div>
                        </div>
                        
                        <!-- <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div> -->
                      </div>
                    </div>
                  </div>        
                </div>
              </div>
            </div>        
            
            <div class="app-main" style="z-index: unset">
              <div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
                <div class="app-header__logo">
                  <div class="logo-src"></div>
                  <div class="header__pane ml-auto">
                    <div>
                      <button type="button"  class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                          <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                          </span>
                      </button>
                    </div>
                  </div>
                </div>
                  
                <div class="app-header__mobile-menu">
                  <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                    </button>
                  </div>
                </div>
                
                <div class="app-header__menu">
                  <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                      <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                      </span>
                    </button>
                  </span>
                </div>

                <div class="scrollbar-sidebar">
                  <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                      <li class="app-sidebar__heading">Dashboard</li>
                    <?php 
                      if(!isset($_SESSION["user_id"])){
                    ?>
                      <li class="app-sidebar__heading">Inicio</li>
                    <?php
                      }
                      else{
                        $u = UserData::getById(Session::getUID());
                        $menu = PermisoData::getPermisoAllActiveByUsuario($u->id);
                        foreach ($menu as $row) {
                          $active = "";
                          if($_GET["view"] == $row->Ruta){
                            $active = "mm-active";
                          }
                          else{
                            $active = "";
                          }
                    ?>
                      <li>
                        <a href="<?php echo $row->Ruta; ?>" class="<?php echo $active;?>">
                          <i class="metismenu-icon <?php echo $row->Icono; ?>"></i>
                          <?php echo $row->Descripcion; ?>
                        </a>
                      </li>
                     <?php 
                        }
                      }
                    ?>
                    </ul>
                  </div>
                </div>
              </div>
            
              <div class="app-main__outer" style="z-index: unset">
              <?php 
                View::load("");
              ?>
              </div>
            </div>
          </div>


          <div class="app-drawer-wrapper">
            <div class="drawer-nav-btn">
                <button type="button" class="hamburger hamburger--elastic is-active">
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            </div>
            <div class="drawer-content-wrapper">
                <div class="scrollbar-container ps ps--active-y container-right-rt">
                    
                   
                </div>
            </div>
          </div>

          <div class="app-drawer-overlay animated fadeIn d-none"></div>
    <?php
        }
        else { 
          /* Si no está logeado, redirige a Pagina de Login*/
          /* INICIO CARGA VISTA LOGIN */
      ?>
      <?php 
          View::load("login");
      ?>
      <?php
          /* FIN CARGA VISTA LOGIN */
        }
      ?>

    <?php
      
      if(isset($_GET["view"]) && Session::getUID()){ 
      ## INICIO RECURSOS JS SI USUARIO ESTA LOGEADO 
        switch ($_GET["view"]) {
          case 'home':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>
            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />   

          <?php
            break;

          case 'presupuesto':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
          
          <?php
            break;

          case 'incidentes':
          ?>
            <!-- <script type="text/javascript" src="../css/assets/scripts/main.js"></script> -->
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script>  
          
          <?php
            break;

          case 'incidentesadm':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script> 
          
          <?php
            break;

          case 'incidentescam':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script> 
          
          <?php
            break;


          case 'incidentesger':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script> 

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
                
            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script>    
          <?php
            break;

          case 'patencion':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script> 

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
                
            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script>    
          <?php
            break;

          case 'login':
          ?>
             <!-- Bootstrap core JavaScript-->
              <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
              <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

          <?php
          break;
          
          case 'solicitudes':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

          <?php
          break;

          case 'pmpadm':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script> 
          
          <?php
            break;

          case 'serviciosadm':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script>    

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script> 
          
          <?php
            break;

          case 'pmpger':
          ?>
            <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
            <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
           
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

            <link rel="stylesheet" href="../js/SmartWizard-master/dist/css/smart_wizard.css"/>

            <script type="text/javascript" src="../js/SmartWizard-master/src/js/jquery.smartWizard.js"></script> 

            <!-- Optional SmartWizard theme -->
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
            <link href="../js/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
                
            <link rel="stylesheet" href="../css/zoom.css"/>
            <script type="text/javascript" src="../js/zoom.js"></script>    
          <?php
            break;

          default:
          ?>
          <script type="text/javascript" src="../css/assets/scripts/main.8d288f825d8dffbbe55e.js"></script>
          <?php
            # code...
            break;
        }
    ?>  



    <?php
      }
      ## FIN RECURSOS JS SI USUARIO ESTA LOGEADO

      /* SI USUARIO NO ESTA LOGEADO*/
      else{
        if(isset($_GET["view"])){
        ?>
          <!-- Bootstrap core JavaScript-->
          <script src="../vendor/jquery/jquery.min.js"></script>
          <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="../js/sb-admin-2.min.js"></script>
        <?php
        }
        else{
        ?>
          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin-2.min.js"></script>
        <?php
        }
      }
    ?>
    <script type="text/javascript">
      $(document).ready(function(){ 
        $('#page-loader').fadeOut(500);
        $('.dropdown-toggle').dropdown();
      }); 
    </script>
  </body>
</html>
