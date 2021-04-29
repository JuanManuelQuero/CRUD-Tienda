<?php
namespace Clases;

use PDO;
use PDOException;

class Conexion {
    protected static $conexion;

    public function __construct()
    {
        if(self::$conexion == null) {
            self::crearConexion();
        }
    }

    public static function crearConexion() {
        $opciones = parse_ini_file("../.config");
        $base = $opciones["bbdd"];
        $usuario = $opciones["usuario"];
        $pass = $opciones["pass"];
        $host = $opciones["host"];

        $dns = "mysql:host=$host;dbname=$base;charset=utf8mb4";

        try {
            self::$conexion = new PDO($dns, $usuario, $pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex) {
            die("Error al conectar a la base de datos:" .$ex->getMessage());
        }
    }
}