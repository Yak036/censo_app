<?php


$url = isset($_GET['url']) ? $_GET['url'] : '';
//path = Ruta raiz de la pagina (__DIR__ la da)
$path = __DIR__ . "/app/views/";
// file: archivo al cual se dirige el usuario;
$file = $path . $url . ".php";

if (!empty($url)) {
  if (is_file($file)) {
    require $file;
  } else {
    echo "No se encontro la pagina";
  }
} else {
  header("location: inicio");
}
