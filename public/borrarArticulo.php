<?php
session_start();
//Comprobamos si la id del articulo existe
if(!isset($_POST['id'])) {
    header("Location:index.php");
    die();
}

require "../vendor/autoload.php";
use Clases\Articulos;

$articulo = new Articulos();
$articulo->setId($_POST['id']);
$articulo->delete();
$articulo = null;
$_SESSION['mensaje'] = "Artículo borrado correctamente";
header("Location:index.php");