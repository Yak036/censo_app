<?php
require("../models/conexion.php");
require("../models/viviendas/actualizarvivienda.php");
// ? Agregar una vivienda
$viviendaConfig = new Vivienda;
if (isset($_POST["aggVivienda"])) {
  $viviendaConfig = new Vivienda;
  $floorNum = strtoupper($_POST["floorNum"]);
  $viviendaConfig->aggVivienda($conexion, $floorNum);
  header("Location: http://localhost/serviciocomunitario/registrarviviendas?exito=true");
  exit();
}
// ? Eliminar una vivienda existente 
if (isset($_GET["idVivienda"])) {
  $idVivienda = $_GET["idVivienda"];
  $viviendaConfig->deleteViviendas($conexion, $idVivienda);
  header("Location: http://localhost/serviciocomunitario/registrarviviendas?exitoDelete=true");
  exit();
}
// ? Solicitar la edicion de datos de una vivienda
if (isset($_POST["idVivienda"])) {
  $idVivienda = $_POST["idVivienda"];
  header("Location: http://serviciocomunitario.test/registrarintegrantes?idVivienda={$idVivienda}");
}