<?php
namespace Clases;

use PDO;
use PDOException;

class Articulos extends Conexion {
    private $id;
    private $nombre;
    private $pvp;
    private $stock;

    public function __construct()
    {
        parent::__construct();
    }

    //### CRUD ###
    public function create() {
        $c = "insert into articulos(nombre, pvp, stock) values(:n, :p, :s)";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n' =>$this->nombre,
                ':p' =>$this->pvp,
                ':s' =>$this->stock
            ]);
        }catch(PDOException $ex) {
            die("Error al crear el articulo: " .$ex->getMessage());
        }
    }

    public function read() {
        $c = "select * from articulos where id=:i";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':i' => $this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al devolver el articulo: " . $ex->getMessage());
        }
        $file = $stmt->fetch(PDO::FETCH_OBJ);
        return $file;
    }

    public function update() {
        $c = "update articulos set nombre=:n, pvp=:p, stock=:s where id=:i";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n' =>$this->nombre,
                ':p' =>$this->pvp,
                ':s' =>$this->stock,
                ':i' =>$this->id
            ]);
        }catch(PDOException $ex) {
            die("Error al actualizar el libro: " .$ex->getMessage());
        }
    }

    public function delete() {
        $c = "delete from articulos where id=:i";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':i' =>$this->id
            ]);
        }catch(PDOException $ex) {
            die("Error al borrar el articulo: " .$ex->getMessage());
        }
    }

    //### Mis Métodos ###
    public function devolverTodo() {
        $c = "select * from articulos order by nombre";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute();
        }catch(PDOException $ex) {
            die("Error al devolver todos los articulos: " .$ex->getMessage());
        }
        return $stmt;
    }

    //Metodo para comprobar si el articulo que hemos creado existe ya
    public function existeArticulo($articulo) {
        $c = "select * from articulos where nombre=:n";
        $stmt = parent::$conexion->prepare($c);
        try {
            $stmt->execute([
                ':n' => $articulo
            ]);
        } catch (PDOException $ex) {
            die("Error al comprobar existencia del artículo: " . $ex->getMessage());
        }
        $file = $stmt->fetch(PDO::FETCH_OBJ);
        return ($file == null) ? false : true;
    }


    //### GET and SET ###
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of pvp
     */ 
    public function getPvp()
    {
        return $this->pvp;
    }

    /**
     * Set the value of pvp
     *
     * @return  self
     */ 
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }
}