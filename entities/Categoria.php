<?php
class Categoria
{

    private $id;
    private $descripcion;
    private $estado;
    

    public function __construct($descripcion = null, $estado = null)
    {
        $this->descripcion = $descripcion;
        $this->estado = $estado;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
}
