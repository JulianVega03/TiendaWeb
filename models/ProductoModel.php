<?php
include_once 'entities/Producto.php';

class ProductoModel extends Model
{
    private $producto;

    public function __construct()
    {
        $this->producto = new Producto();
        parent::__construct();
    }

    public function insertar($producto)
    {
        $query = $this->db->connect()->prepare('INSERT INTO producto (referencia, nombre, descripcion_corta, detalle, valor, palabras_clave, estado, id_categoria, id_marca, img) VALUES(:referencia, :nombre, :descripcion_corta, :detalle, :valor, :palabras_clave, :estado, :id_categoria, :id_marca, :img)');
        try {
            $query->execute([
                'referencia' => $producto->getReferencia(),
                'nombre' => $producto->getNombre(),
                'descripcion_corta' => $producto->getDescripcion_corta(),
                'detalle' => $producto->getDetalle(),
                'valor' => $producto->getValor(),
                'palabras_clave' => $producto->getPalabras_clave(),
                'estado' => $producto->getEstado(),
                'id_categoria' => $producto->getId_categoria(),
                'id_marca' => $producto->getId_marca(),
                'img' => $producto->getImg(),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function editar($producto)
    {
        $query = $this->db->connect()->prepare('UPDATE producto SET referencia = :referencia, nombre = :nombre, descripcion_corta = :descripcion_corta, detalle = :detalle, valor = :valor, palabras_clave = :palabras_clave, estado = :estado, id_categoria = :id_categoria, id_marca = :id_marca, img = :img WHERE id = :id');
        try {
            $query->execute([
                'referencia' => $producto->getReferencia(),
                'nombre' => $producto->getNombre(),
                'descripcion_corta' => $producto->getDescripcion_corta(),
                'detalle' => $producto->getDetalle(),
                'valor' => $producto->getValor(),
                'palabras_clave' => $producto->getPalabras_clave(),
                'estado' => $producto->getEstado(),
                'id_categoria' => $producto->getId_categoria(),
                'id_marca' => $producto->getId_marca(),
                'img' => $producto->getImg(),
                'id' => $producto->getId(),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM producto");

            while ($row = $query->fetch()) {
                $item = new Producto();
                $item->setId($row['id']);
                $item->setReferencia($row['referencia']);
                $item->setNombre($row['nombre']);
                $item->setDescripcion_corta($row['descripcion_corta']);
                $item->setDetalle($row['detalle']);
                $item->setValor($row['valor']);
                $item->setPalabras_clave($row['palabras_clave']);
                $item->setEstado($row['estado']);
                $item->setId_categoria($row['id_categoria']);
                $item->setId_marca($row['id_marca']);
                $item->setImg($row['img']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getPorCategoria($idCategoria)
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id_categoria = :id");
            $query->execute([
                'id' => $idCategoria,
            ]);
            while ($row = $query->fetch()) {
                $item = new Producto();
                $item->setId($row['id']);
                $item->setReferencia($row['referencia']);
                $item->setNombre($row['nombre']);
                $item->setDescripcion_corta($row['descripcion_corta']);
                $item->setDetalle($row['detalle']);
                $item->setValor($row['valor']);
                $item->setPalabras_clave($row['palabras_clave']);
                $item->setEstado($row['estado']);
                $item->setId_categoria($row['id_categoria']);
                $item->setId_marca($row['id_marca']);
                $item->setImg($row['img']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($id)
    {
        $item = new Producto();
        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setReferencia($row['referencia']);
                $item->setNombre($row['nombre']);
                $item->setDescripcion_corta($row['descripcion_corta']);
                $item->setDetalle($row['detalle']);
                $item->setValor($row['valor']);
                $item->setPalabras_clave($row['palabras_clave']);
                $item->setEstado($row['estado']);
                $item->setId_categoria($row['id_categoria']);
                $item->setId_marca($row['id_marca']);
                $item->setImg($row['img']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function eliminar($id) 
    {
        $query = $this->db->connect()->prepare("DELETE FROM producto WHERE id = :id");
        try {
            $query->execute(['id' => $id]);
        } catch (PDOException $e) {
            return null;
        }
    }
}
