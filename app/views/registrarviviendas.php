<?php
include("app/models/conexion.php");
include("app/models/viviendas/actualizarvivienda.php");

if ($conexion) {
  $viviendas = new Vivienda;
  $tabla = $viviendas->getViviendas($conexion);
}
$texto = "p3-94";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Vivienda</title>
  <!-- //? link de bootstrap -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- //? Link SweetAlert2-->
  <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.min.css">

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




  <div class="container-fluid custom-container" id="container-viviendas">
    <button type="button" class="btn btn-outline-warning agg-vivienda" data-bs-toggle="modal"
      data-bs-target="#exampleModal"> Agregar Vivienda
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
        <path
          d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
      </svg>
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="app/controllers/viviendas.php" method="post">
            <!-- //! input hidden para detectar si se quiere agregar una vivienda -->
            <input type="hidden" name="aggVivienda" value="1">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Vivienda</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">

              <div class="form-floating col-md-6">

                <div class="form-floating">
                  <input style="text-transform: uppercase;" type="text" class="form-control" id="floatingInputGrid"
                    placeholder="Ej. P1-03" value="" name="floorNum" autocomplete="nope">
                  <label for="floatingInputGrid">Piso y numero</label>
                </div>

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Crear vivienda</button>
            </div>
          </form>
        </div>

      </div>
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col"># Piso</th>
          <th scope="col">Jefe/a</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabla as $fila) { ?>
        <tr>
          <form action="app/controllers/viviendas.php" method="get" class="form-viviendas">
            <!-- // ! EN EL INPUT TYPE HIDDEN PONDRAS EL ID DE LA VIVIENDA -->
            <input type="hidden" name="idVivienda" value="<?php echo  $fila["viviendaId"]; ?>">
            <input type="hidden" name="viviendaName" class="vivienda-name" value="<?php echo $fila["numero"] ?>">
            <th scope="row"><?php echo $fila["numero"] ?></th>
            <td>
              <?php echo $fila["personaNombre"] = (is_null($fila["personaNombre"])) ? "Ninguno" : "{$fila["personaNombre"]} {$fila["personaApellido"]}"; ?>
            </td>
            <td>
              <button formmethod="post" title="Editar" type="submit" class="btn btn-warning" style="width:40px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                  <path
                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                </svg>
              </button>
              <button title="Eliminar" type="submit" class="btn btn-danger delete-vivienda" style="width:40px;">
                X
              </button>
            </td>
          </form>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- //? sweetalert2 -->
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <?php
  //TODO: Dependiendo de la variable get que llegue genera un input hidden para una alerta diferente
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["exito"])) {
  ?>
  <input type="hidden" class="exitoAggVivienda" value="1">
  <?php
    }

    if (isset($_GET["exitoDelete"]) && $_GET["exitoDelete"] == true) {
    ?>
  <input type="hidden" class="exitoDeleteVivienda" value="1">
  <?php
    }
  }
  ?>
  <script src="public/js/alert.js"></script>
</body>

</html>
