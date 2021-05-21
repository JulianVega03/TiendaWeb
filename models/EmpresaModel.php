<?php
include_once 'entities/Empresa.php';

class EmpresaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM empresa");

            while ($row = $query->fetch()) {
                $item = new Empresa($row['id'], $row['nombre'], $row['quines_somos'], $row['email_contacto'], $row['direccion'], $row['telefono_contacto'], $row['facebook'], $row['twitter'], $row['instagram']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function actualizar($empresa)
    {
        $query = $this->db->connect()->prepare("UPDATE empresa SET nombre = :nombre, quines_somos = :quines_somos, email_contacto = :email_contacto, direccion = :direccion, telefono_contacto = :telefono_contacto, facebook = :facebook, twitter = :twitter, instagram = :instagram WHERE id = :id");
        try {
            $query->execute([
                'id' => $empresa->getId(),
                'nombre' => $empresa->getNombre(),
                'quines_somos' => $empresa->getQuienes_somos(),
                'email_contacto' => $empresa->getEmail_contacto(),
                'direccion' => $empresa->getDireccion(),
                'telefono_contacto' => $empresa->getTelefono_contacto(),
                'facebook' => $empresa->getFacebook(),
                'twitter' => $empresa->getTwitter(),
                'instagram' => $empresa->getInstagram(),
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

}
