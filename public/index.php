<?php
session_start();
//Hacemos uso del autoload y de la clase Articulos
require "../vendor/autoload.php";

use Clases\Articulos;

//Creamos un objeto de Articulos y llamamos al metodo devolverTodo()
$articulos = new Articulos();
$misArticulos = $articulos->devolverTodo();
$articulos = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Artículos</title>
</head>

<body style="background-color: lightblue;">
    <h3 class="text-center mt-3">Tienda Almería</h3>
    <div class="container mt-3">
        <?php
        require "resources/mensaje.php";
        ?>

        <!-- Botón para crear un nuevo artículo -->
        <a href="crearArticulo.php" class="btn btn-success my-3">Nuevo Artículo</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">P.V.P.</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($file = $misArticulos->fetch(PDO::FETCH_OBJ)) {
                    echo <<< TEXTO
                        <tr>
                            <th scope="row">{$file->id}</th>
                            <td>{$file->nombre}</td>
                            <td>{$file->pvp} €</td>
                            <td>{$file->stock}</td>
                            <td>
                                <form name="a" method="POST" class="form-inline" action="borrarArticulo.php">
                                    <a href="editarArticulo.php?id={$file->id}" class="btn btn-primary">Editar</a>
                                    <input type="hidden" name="id" value="{$file->id}">
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                     TEXTO;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>