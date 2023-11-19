<?php
include("app/models/conexion.php");
include("app/models/viviendas/actualizarvivienda.php");
$vivienda = new Vivienda;
if ($_SERVER["REQUEST_METHOD"]="GET") {
  if (!empty($_GET["idVivienda"])) {
    //? Sacar data de esta vivienda
    $tabla = $vivienda->getViviendas($conexion,$_GET["idVivienda"]);

  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- //! Aqui recuerda colocar el piso y nu   mero de la vivienda -->
  <title>Actualizacion de la vivienda</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="public/css/index.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="public/media/img/LOGO.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Servicio Comunitario
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registrarviviendas">Registrar vivienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="verregistros">Consultar Datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Derechos reservados para el IUJO</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">

  </div>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
