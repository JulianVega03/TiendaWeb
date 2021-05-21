<?php
class Producto
{

    private $id;
    private $referencia;
    private $nombre;
    private $descripcion_corta;
    private $detalle;
    private $valor;
    private $palabras_clave;
    private $estado;
    private $id_categoria;
    private $id_marca;
    private $img;

    public function __construct($referencia = null, $nombre = null, $descripcion_corta = null, $detalle = null, $valor = null, $palabras_clave = null, $estado = null, $id_categoria = null, $id_marca = null, $img = null)
    {
        $this->referencia = $referencia;
        $this->nombre = $nombre;
        $this->descripcion_corta = $descripcion_corta;
        $this->detalle = $detalle;
        $this->valor = $valor;
        $this->palabras_clave = $palabras_clave;
        $this->estado = $estado;
        $this->id_categoria = $id_categoria;
        $this->id_marca = $id_marca;
        $this->img = $img;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }

    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion_corta()
    {
        return $this->descripcion_corta;
    }

    public function setDescripcion_corta($descripcion_corta)
    {
        $this->descripcion_corta = $descripcion_corta;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getPalabras_clave()
    {
        return $this->palabras_clave;
    }

    public function setPalabras_clave($palabras_clave)
    {
        $this->palabras_clave = $palabras_clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }

    public function getId_marca()
    {
        return $this->id_marca;
    }

    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }
}
