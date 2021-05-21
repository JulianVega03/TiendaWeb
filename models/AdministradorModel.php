<?php
include_once 'entities/Administrador.php';

class AdministradorModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function validarInicioSesion($user, $pass)
    {
        $item = new Administrador();
        $query = $this->db->connect()->prepare("SELECT * FROM administrador WHERE email = :usu AND clave = :pass");
        try {
            $query->execute([
                'usu' => $user,
                'pass' => $pass
            ]);

            while ($row = $query->fetch()) {
                $item->setId($row['id']);
                $item->setNombres($row['nombres']);
                $item->setApellidos($row['apellidos']);
                $item->setEmail($row['email']);
                $item->setClave($row['clave']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
}
