<?php
$dir_res = "res/";
$dir_vendor = "vendor/";
$dir_js = "js/";
$dir_act = "index/";

if(isset($_GET["view"])){
  $dir_res = "../res/";
  $dir_vendor = "../vendor/";
  $dir_js = "../js/";
  $dir_act = "";
}

if(isset($_SESSION['user_id'])){
  if(($_SESSION['user_id'])){
    if(isset($_GET["view"])){
      $u = UserData::getById(Session::getUID());
      $tipo_usuario = $u->user_type;
      switch ($tipo_usuario) {
        case 1: //renzot
          echo "<script>window.location='home';</script>";
          break;
        
        case 2: // Técnicos
          echo "<script>window.location='patencion';</script>";
          break;

        case 3: // Adm Campus
          echo "<script>window.location='incidentesadm';</script>";
          break;
        
        case 4: // Gerencia (Manuel Mendoza, Blanca Zavaleta)
          echo "<script>window.location='incidentesger';</script>";
          break;

        case 5: // Asistente Adm. Campus
          echo "<script>window.location='patencion';</script>";
          break;

        case 6: // Gerente de Sede
          echo "<script>window.location='incidentescam';</script>";
          break;
        
        default:
          echo "<script>window.location='home';</script>";
          break;
      }
    }
    else{
      echo "<script>window.location='index/home';</script>";
    }
  }
}

?>
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido! </h1>
                  </div>
                  <form class="user" accept-charset="UTF-8" role="form" method="post" action="<?php echo $dir_act; ?>processlogin">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Clave" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control btn btn-facebook submit" style="float: right; margin-left: 0px;" type="submit" value="Iniciar Sesión">
                    </div>
                  </form>
                  <hr>
              
                  <div class="text-center">
                    <a class="small" href="#">Perú - 2020</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>