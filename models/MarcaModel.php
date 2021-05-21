<?php
include_once 'entities/Marca.php';

class MarcaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM marca");

            while ($row = $query->fetch()) {
                $item = new Marca();
                $item->setId($row['id']);
                $item->setNombre($row['nombre']);
                $item->setDescripcion($row['descripcion']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insertar($marca)
    {
        $query = $this->db->connect()->prepare('INSERT INTO marca (nombre, descripcion) VALUES(:nombre, :descripcion)');
        try {
            $query->execute([
                'nombre' => $marca->getNombre(),
                'descripcion' => $marca->getDescripcion(),
            ]);
            return true;
        } catch (PDOException $e) {
            echo($e);
            return false;
        }
    }

    public function getById($id)
    {
        $item = new Marca();
        $query = $this->db->connect()->prepare("SELECT * FROM marca WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setNombre($row['nombre']);
                $item->setDescripcion($row['descripcion']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function actualizar($marca)
    {
        $query = $this->db->connect()->prepare("UPDATE marca SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");
        try {
            $query->execute([
                'id' => $marca->getId(),
                'nombre' => $marca->getNombre(),
                'descripcion' => $marca->getDescripcion(),
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
        $query = $this->db->connect()->prepare("DELETE FROM marca WHERE id = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

}
