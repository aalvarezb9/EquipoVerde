<?php 
    session_start();
    if (!isset($_SESSION["token"]))
      {header("Location: error.html");}
  
    if (!isset($_COOKIE["token"]))
      {header("Location: error.html");}
  
    if ($_SESSION["token"] != $_COOKIE["token"]){
      header("Location: error.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/registerStyles.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/config.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/icono.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/5843da1e4e.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-nav-config">
    <a class="navbar-brand" href="loggedIndex.html">PROYECTO MORAZÁN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="loggedIndex.html#inicio">INICIO</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loggedIndex.html#mapa">MAPA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loggedIndex.html#graficos">GRÁFICOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loggedIndex.html#twitter">TWITTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="loggedIndex.html#acercaDe">ACERCA DE</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userName" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
          </a>
          <div class="dropdown-menu" aria-labelledby="userName">
            <a class="dropdown-item" href="config.php">Configuraciones</a>
            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
          </div>
        </li>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row centrar-form col-xl-6">
      <div class="col-12">
        <strong>Datos generales</strong>
        <button class="edit-btn" type="button" onclick="habilitarEdicion()">Editar</button>
        <hr>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Nombre</label>
        <input id="nombre" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Apellido</label>
        <input id="apellido" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Institución</label>
        <input id="institucion" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">País</label>
        <input id="pais" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Correo electrónico</label>
        <input id="email" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Confirmar correo electrónico</label>
        <input id="confirm-email" type="text" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Contraseña</label>
        <input id="password" type="password" class="form-control" disabled>
      </div>
      <div class="col-xl-6 col-md-6 col-sm-12">
        <label for="" class="col-form-label">Confirmar contraseña</label>
        <input id="confirm-password" type="password" class="form-control" disabled>
      </div>
      <div class="col-12">
        <label for="" class="col-form-label">Género</label>
        <div class="form-check">
          <input id="Masculino" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
            value="Masculino" disabled>
          <label class="form-check-label" for="exampleRadios2" style="width: 100px;">
            Masculino
          </label>
          <input id="Femenino" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
            value="Femenino" disabled>
          <label class="form-check-label" for="exampleRadios2">
            Femenino
          </label>
          <small class="red" id="obligatorio-correo"></small>
        </div>
      </div>
      <br><br>
      <div>
        <small style="color: green;" id="success"></small>
        </div>
      <div class="col-xl-12 col-md-12 registered-block">
        <button onclick="validar()" type="button" class="btn register-btn config-btn">Guardar cambios</button>
        <button onclick="cancelar()" type="button" class="btn register-btn config-btn cancel-btn">Cancelar</button>
      </div>
      <div class="col-12">
          <strong>Gestión de cuenta</strong>
          <hr>
      </div>
      <div class="col-xl-12 col-md-12 col-sm-12" style="margin-top: 10px;">
        <span>Eliminar cuenta</span>
        <button type="button" class="btn  register-btn config-btn" data-toggle="modal" data-target="#eliminarCuenta">Eliminar</button>
    </div>
      </div>
    </div>

    <div class="modal fade" id="eliminarCuenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            ¿Estás seguro/a de querer eliminar tu cuenta?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn register-btn config-btn cancel-btn" data-dismiss="modal">Cerrar</button>
            <button onclick="eliminarCuenta()" type="button" class="btn register-btn config-btn">Estoy seguro/a</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script src="js/handlerConfig.js"></script>
</body>

</html>