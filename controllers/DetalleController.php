<?php
require_once 'models/CategoriaModel.php';
require_once 'IndexController.php';

class DetalleController extends Controller
{
    private $productoModel;
    private $categoriaModel;
    private $producto;
    private $info;

    public function __construct()
    {
        $this->productoModel = $this->model('producto');
        $this->categoriaModel = new CategoriaModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex($id)
    {
        $this->producto = $this->productoModel->getById($id);
        $this->cambiarIdCategoriaXnombre();
        $data = $this->info;
        $data += [
            'producto' => $this->producto,
            'categorias' => $this->categoriaModel->get()
        ];
        $this->view('detalle', $data);
    }

    private function cambiarIdCategoriaXnombre(){
        $nombreCategoria = $this->categoriaModel->getById($this->producto->getId_categoria())->getDescripcion();
        $this->producto->setId_categoria($nombreCategoria);
    }
}
