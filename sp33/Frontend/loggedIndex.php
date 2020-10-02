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
  <title>Proyecto Morazán</title>
  <link rel="stylesheet" href="css/config.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/icono.jpg" type="image/x-icon">
  <script src="https://kit.fontawesome.com/5843da1e4e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light custom-nav">
    <a class="navbar-brand" href="#">PROYECTO MORAZÁN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#inicio">INICIO</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#mapa">MAPA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#graficos">GRÁFICOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#twitter">TWITTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#acercaDe">ACERCA DE</a>
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
  <main class="container-fluid">
    <div class="row">
      <div class="relleno"></div>
      <div id="satelite"></div>
      <section id="inicio">
        <div class="descripcionProyecto col-xl-5 col-md-6 col-sm-12">
          <h1>Proyecto Morazán</h1>
          <p>Es una iniciativa centroamericana para colocar el primer satélite hondureño y el primer satélite
            centroamericano desarrollado por tres naciones hermanas: <strong>Honduras, Guatemala y Costa Rica</strong>.
          </p>
        </div>
      </section>
      <section id="mapa" class="secciones">
        <div class="titulo-sections">
          <h1>Ubicación del satélite</h1>
          <section id="map-sec">
          </section>
          <section id="map-sec-2" style="display: none;">
          </section>
          <button id="mostrar-orbita" onclick="dinamico()">Dibujar órbita</button>
          <button id="mostrar-posicion" style="display: none;" onclick="estatico()">Ver posición real</button>
        </div>
      </section>
      <section id="graficos" class="secciones">
        <div class="titulo-sections">
          <h1>Estadísticas de descarga de datos</h1>
        </div>
      </section>
      <section id="twitter" class="secciones">
        <div class="titulo-sections">
          <h1>Cuentas de Twitter que podrían interesarte</h1>
        </div>
        <div class="container-fluid">
          <div class="row" style="margin-left: auto; margin-right: auto;">
            <div style="overflow-y: scroll; height:500px;" class="figure col-xl-3">
              <a class="twitter-timeline" href="https://twitter.com/iafastro?ref_src=twsrc%5Etfw">Tweets by
                iafastro</a>
            </div>
            <div style="overflow-y: scroll; height:500px;" class="figure col-xl-3">
              <a class="twitter-timeline" href="https://twitter.com/CopernicusEU?ref_src=twsrc%5Etfw">Tweets by
                CopernicusEU</a>
            </div>
            <div style="overflow-y: scroll; height:500px;" class="figure col-xl-3">
              <a class="twitter-timeline" href="https://twitter.com/NASA?ref_src=twsrc%5Etfw">Tweets by NASA</a>
            </div>
            <div style="overflow-y: scroll; height:500px;" class="figure col-xl-3">
              <a class="twitter-timeline" href="https://twitter.com/SpaceX?ref_src=twsrc%5Etfw">Tweets by SpaceX</a>
            </div>
          </div>
        </div>

      </section>
      <section id="acercaDe" class="secciones">
        <div class="titulo-sections">
          <h1>¡Conócenos!</h1>
          <h3 style="color: black">Somos un equipo integrado por siete estudiantes de cinco carreras diferentes.</h3>
        </div>
      </section>
    </div>
  </main>
  <footer> Copyright &copy; 2020 Equipo Verde, Spacethon - Todos los derechos reservados</footer>
</body>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="js/handlerLogged.js"></script>

</html>