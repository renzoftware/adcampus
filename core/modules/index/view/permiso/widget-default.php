<script type="text/javascript" src="../res/stacktable/stacktable.js"></script>
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
<script src="../res/jquery-ui-1.11.2/jquery-ui.js"></script>
<script src="../res/jquery-validate/dist/jquery.validate.min.js"></script>

<!-- <link href="../res/jquery-ui-1.11.2/themes/cupertino/jquery-ui.css" rel="stylesheet"> -->
  
<style type="text/css">
  /* RESPONSIVE EXAMPLE */
  .stacktable.large-only { display: table; }
  .stacktable.small-only { display: none; }

  @media (max-width: 700px) {
    .stacktable.large-only { display: none; }

    .stacktable.small-only {
      display: table;
    }

    .stacktable.small-only th{
      text-align: center !important;
    }

  }

  .error{
      /*margin: 0 0 0 20px;*/
      padding: 3px 10px;
      color: #FFF;
      border-radius: 3px 4px 4px 3px;
      background-color: #CE5454;
      /*max-width: 170px;*/
      white-space: pre;
      position: relative;
      transition: .15s ease-out;
    }

    .r_h3 {
      margin: 5px 0 6px;
    float: left !important;
    display: block !important;
    }
</style>
<div class="row">
  <div class="x_panel">
    <div class="x_title">
      <div class="col-md-6">
        <h3 class="r_h3">Control <b>Permisos</b>&nbsp;</h3> 
        <button class="btn btn-success" data-toggle="modal" href="#addPermisoModal"><i class="glyphicon glyphicon-plus"></i> Nuevo</button>
      </div>
          
      <div class="col-md-6" >
        <div id="custom-search-input">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
            <span class="input-group-btn">
              <button class="btn btn-info" type="button" onclick="load(1);">
                <span class="glyphicon glyphicon-search" style="color: #FFFFFF" ></span>
              </button>
            </span>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
                 
    <div class="x_content">
      <div id="loader_permiso"></div><!-- Carga de datos ajax aqui -->
      <div id="resultados"></div><!-- Carga de datos ajax aqui -->
      <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
    </div>
  </div>
</div>
  <!-- Add Modal HTML -->
  <?php include("modal_permiso_add.php");?>
  <!-- Edit Modal HTML -->
  <?php include("modal_permiso_edit.php");?>

<script src="../res/js/script_permiso.js"></script>