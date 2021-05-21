<?php
require_once 'IndexController.php';
require_once 'entities/Empresa.php';
require_once 'models/EmpresaModel.php';
require_once 'models/ProductoModel.php';

class WelcomeController extends Controller
{

    private $info;

    public function __construct()
    {
        $this->empresaModel = new EmpresaModel();
        $this->productoModel = new ProductoModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex()
    {
        $data = $this->info;
        $data += [
            'estado' => "normal",
            'productos' => $this->productoModel->get(),
        ];
        $this->view('index', $data);
    }

    public function actionActualizarEmpresa()
    {
        $empresa = $this->empresaModel->get()[0];
        $data = $this->info;
        $data += [
            'estado' => "normal",
            'empresa' => $empresa,
        ];
        $this->view('empresas/empresa', $data);
    }

    function actionGuardarEmpresa()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['id'], $_POST['nombre'], $_POST['quienes_somos'], $_POST['email_contacto'],
            $_POST['direccion'], $_POST['telefono_contacto'], $_POST['facebook'], $_POST['twitter'], $_POST['instragram'])) {

                $id =  $_POST['id'];
                $nombre = $_POST['nombre'];
                $quienes_somos = $_POST['quienes_somos'];
                $email_contacto = $_POST['email_contacto'];
                $direccion = $_POST['direccion'];
                $telefono_contacto = $_POST['telefono_contacto'];
                $facebook = $_POST['facebook'];
                $twitter = $_POST['twitter'];
                $instragram = $_POST['instragram'];
                $empresa = new Empresa($id, $nombre, $quienes_somos, $email_contacto, $direccion, $telefono_contacto, $facebook, $twitter, $instragram);
                if ($this->empresaModel->actualizar($empresa)) {
                    $empresa = $this->empresaModel->get()[0];
                    $data = $this->info;
                    $data += [
                        'estado' => "success",
                        'empresa' => $empresa,
                    ];
                    $this->view('empresas/empresa', $data);
                } else {
                    $empresa = $this->empresaModel->get()[0];
                    $data = $this->info;
                    $data += [
                        'estado' => "error",
                        'empresa' => $empresa,
                    ];
                    $this->view('empresas/empresa', $data);
                }
            }
        } else {
            $empresa = $this->empresaModel->get()[0];
            $data = $this->info;
            $data += [
                'estado' => "error",
                'empresa' => $empresa,
            ];
            $this->view('empresas/empresa', $data);
        }
    }
}
