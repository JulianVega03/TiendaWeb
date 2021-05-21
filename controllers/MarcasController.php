<?php
require_once 'models/MarcaModel.php';
require_once 'entities/Marca.php';
require_once 'IndexController.php';

class MarcasController extends Controller
{
    private $marcaModel;
    private $info;

    public function __construct()
    {
        $this->marcaModel = new MarcaModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex()
    {
        $data = $this->info;
        $data += [
            'marcas' => $this->marcaModel->get(),
            'estado' => "normal"
        ];
        $this->view('marcas/marcas', $data);
    }

    public function actionAgregar()
    {
        $data = $this->info;
        $data += [
            'estado' => "normal",
        ];
        $this->view('marcas/registrarMarca', $data);
    }

    public function actionEditar($id)
    {
        $marca = $this->marcaModel->getById($id);
        $data = $this->info;
        $data += [
            'estado' => "normal",
            'id' => $id,
            'marca' => $marca,
        ];
        $this->view('marcas/editarMarca', $data);
    }

    public function actionNuevo()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['nombre'], $_POST['descripcion'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $marca = new Marca($nombre, $descripcion);

                if ($this->marcaModel->insertar($marca)) {
                    $data = $this->info;
                    $data += [
                        'marcas' => $this->marcaModel->get(),
                        'estado' => "success"
                    ];
                    $this->view('marcas/marcas', $data);
                } else {
                    $data = $this->info;
                    $data += [
                        'marcas' => $this->marcaModel->get(),
                        'estado' => "error"
                    ];
                    $this->view('marcas/marcas', $data);
                }
            } else {
                $data = $this->info;
                $data += [
                    'marcas' => $this->marcaModel->get(),
                    'estado' => "otro",
                    'msg' => "No se han recibido todos los campos requeridos, inténtelo de nuevo",
                ];
                $this->view('marcas/marcas', $data);
            }
        } else {
            $data = $this->info;
            $data += [
                'marcas' => $this->marcaModel->get(),
                'estado' => "otro",
                'msg' => "Este recurso no está disponible",
            ];
            $this->view('marcas/marcas', $data);
        }
    }

    public function actionEditarGuardar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['nombre'], $_POST['descripcion'])) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $marca = new Marca($nombre, $descripcion);
                $marca->setId($id);
                if ($this->marcaModel->actualizar($marca)) {
                    $data = $this->info;
                    $data += [
                        'marcas' => $this->marcaModel->get(),
                        'estado' => "editado"
                    ];
                    $this->view('marcas/marcas', $data);
                } else {
                    $data = $this->info;
                    $data += [
                        'marcas' => $this->marcaModel->get(),
                        'estado' => "error"
                    ];
                    $this->view('marcas/marcas', $data);
                }
            } else {
                $data = $this->info;
                $data += [
                    'marcas' => $this->marcaModel->get(),
                    'estado' => "otro",
                    'msg' => "No se han recibido todos los campos requeridos, inténtelo de nuevo",
                ];
                $this->view('marcas/marcas', $data);
            }
        } else {
            $data = $this->info;
            $data += [
                'marcas' => $this->marcaModel->get(),
                'estado' => "otro",
                'msg' => "Este recurso no está disponible",
            ];
            $this->view('marcas/marcas', $data);
        }
    }

    public function actionEliminar($id)
    {
        if ($this->marcaModel->eliminar($id)) {
            $data = $this->info;
            $data += [
                'marcas' => $this->marcaModel->get(),
                'estado' => "eliminado"
            ];
            $this->view('marcas/marcas', $data);
        } else {
            $data = $this->info;
            $data += [
                'marcas' => $this->marcaModel->get(),
                'estado' => "otro",
                'msg' => "No se ha podido eliminar esta marca porque hay productos asociados a ella",
            ];
            $this->view('marcas/marcas', $data);
        }
    }
}
