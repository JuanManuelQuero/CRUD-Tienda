<?php
session_start();
//Hacemos uso del autoload y de la clase Articulos
require "../vendor/autoload.php";

use Clases\Articulos;

//Comprobamos si existe el boton crear
if (isset($_POST['crear'])) {
    $nombre = trim($_POST['nombre']);
    $precio = trim($_POST['precio']);
    $stock = trim($_POST['stock']);
    //Comprobamos si los campos a rellenar no estan vacios
    if (strlen($nombre) == 0 || strlen($precio) == 0 || strlen($stock) == 0) {
        $_SESSION['mensaje'] = "Rellene los campos";
        header("Location:{$_SERVER['PHP_SELF']}");
        die();
    }
    //si los campos no estan vacios pasamos aqui
    $esteArticulo = new Articulos();
    //Comprobamos si el articulo que hemos creado no existe
    if (!$esteArticulo->existeArticulo(ucwords($nombre))) {
        $esteArticulo->setNombre(ucwords($nombre));
        $esteArticulo->setPvp($precio);
        $esteArticulo->setStock($stock);
        //Llamamos al metodo crear articulo
        $esteArticulo->create();
        $esteArticulo = null;
        $_SESSION['mensaje'] = "Artículo creado correctamente";
        header("Location:index.php");
    } else {
        //En el caso de que el articulo exista nos mostrara un mensaje y volveremos a donde estamos
        $_SESSION['mensaje'] = "El artículo ya existe";
        $esteArticulo = null;
        header("Location:{$_SERVER['PHP_SELF']}");
        die();
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Crear</title>
    </head>

    <body style="background-color: lightblue;">
        <h3 class="text-center mt-3">Crear Artículo</h3>
        <div class="container mt-3">
            <?php
            require "resources/mensaje.php";
            ?>
            <form name="na" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="mt-2">
                    <label for="nombre" class="form-label">Nombre Artículo</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nuevo Artículo" required>
                </div>
                <div class="mt-2">
                    <label for="precio" class="form-label">Precio Artículo</label>
                    <input type="number" class="form-control" name="precio" placeholder="Precio">
                </div>
                <div class="mt-2">
                    <label for="stock" class="form-label">Stock Artículo</label>
                    <input type="number" class="form-control" name="stock" placeholder="Stock">
                </div>
                <div class="mt-2">
                    <input type="submit" name="crear" value="Crear" class="btn btn-success mr-2">
                    <input type="reset" value="Limpiar" class="btn btn-warning mr-2">
                    <a href="index.php" class="btn btn-primary"> Volver</a>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } ?>