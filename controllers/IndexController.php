<?php
require 'models/EmpresaModel.php';
require 'models/ProductoModel.php';

class IndexController extends Controller
{

    private $empresaModel;
    private $productoModel;

    public function __construct()
    {
        $this->empresaModel = new EmpresaModel();
        $this->productoModel = new ProductoModel();
    }

    public function actionIndex()
    {
        $data = $this->obtenerInfo();
        $data += [
            'estado' => 'normal',
            'productos' => $this->productoModel->get(),
        ];
        $this->view('index', $data);
    }

    public function obtenerInfo()
    {
        $empresa = $this->empresaModel->get()[0];
        return [
            'quienes_somos' => $empresa->getQuienes_somos(),
            'email' => $empresa->getEmail_contacto(),
            'telefono' => $empresa->getTelefono_contacto(),
            'facebook' => $empresa->getFacebook(),
            'twitter' => $empresa->getTwitter(),
            'instagram' => $empresa->getInstagram(),
        ];
    }
    


}
