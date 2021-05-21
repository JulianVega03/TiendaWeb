<?php
include_once 'entities/Categoria.php';

class CategoriaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM categoria");

            while ($row = $query->fetch()) {
                $item = new Categoria();
                $item->setId($row['id']);
                $item->setDescripcion($row['descripcion']);
                $item->setEstado($row['estado']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insertar($categoria)
    {
        $query = $this->db->connect()->prepare('INSERT INTO categoria (descripcion, estado) VALUES(:descripcion, :estado)');
        try {
            $query->execute([
                'descripcion' => $categoria->getDescripcion(),
                'estado' => $categoria->getEstado(),
            ]);
            return true;
        } catch (PDOException $e) {
            echo($e);
            return false;
        }
    }

    public function getById($id)
    {
        $item = new Categoria();
        $query = $this->db->connect()->prepare("SELECT * FROM categoria WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setDescripcion($row['descripcion']);
                $item->setEstado($row['estado']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function actualizar($categoria)
    {
        $query = $this->db->connect()->prepare("UPDATE categoria SET descripcion = :descripcion, estado = :estado WHERE id = :id");
        try {
            $query->execute([
                'id' => $categoria->getId(),
                'estado' => $categoria->getEstado(),
                'descripcion' => $categoria->getDescripcion(),
            ]);
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function eliminar($id) 
    {
        $query = $this->db->connect()->prepare("DELETE FROM categoria WHERE id = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    
}
