<?php
class Empresa
{

    private $id;
    private $nombre;
    private $quienes_somos;
    private $email_contacto;
    private $direccion;
    private $telefono_contacto;
    private $facebook;
    private $twitter;
    private $instagram;

    public function __construct($id, $nombre, $quienes_somos, $email_contacto, $direccion, $telefono_contacto, $facebook, $twitter, $instagram)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->quienes_somos = $quienes_somos;
        $this->email_contacto = $email_contacto;
        $this->direccion = $direccion;
        $this->telefono_contacto = $telefono_contacto;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->instagram = $instagram;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getQuienes_somos()
    {
        return $this->quienes_somos;
    }

    public function setQuienes_somos($quienes_somos)
    {
        $this->quienes_somos = $quienes_somos;
    }

    public function getEmail_contacto()
    {
        return $this->email_contacto;
    }

    public function setEmail_contacto($email_contacto)
    {
        $this->email_contacto = $email_contacto;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getTelefono_contacto()
    {
        return $this->telefono_contacto;
    }

    public function setTelefono_contacto($telefono_contacto)
    {
        $this->telefono_contacto = $telefono_contacto;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }
}
