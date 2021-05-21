<?php
require_once 'models/CategoriaModel.php';
require_once 'entities/Categoria.php';
require_once 'IndexController.php';

class CategoriasController extends Controller
{
    private $categoriaModel;
    private $info;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex()
    {
        $data = $this->info;
        $data += [
            'categorias' => $this->categoriaModel->get(),
            'estado' => "normal",
        ];
        $this->view('categorias/categorias', $data);
    }

    public function actionAgregar()
    {
        $data = $this->info;
        $data += [
            'estado' => "normal",
        ];
        $this->view('categorias/registrarCategoria', $data);
    }

    public function actionEditar($id)
    {
        $categoria = $this->categoriaModel->getById($id);
        $data = $this->info;
        $data += [
            'estado' => "normal",
            'id' => $id,
            'categoria' => $categoria,
        ];
        $this->view("categorias/editarCategoria", $data);
    }

    public function actionNuevo()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['estado'], $_POST['descripcion'])) {
                $estado = $_POST['estado'];
                $descripcion = $_POST['descripcion'];
                $categoria = new Categoria($descripcion, $estado);

                if ($this->categoriaModel->insertar($categoria)) {
                    $data = $this->info;
                    $data += [
                        'categorias' => $this->categoriaModel->get(),
                        'estado' => "success",
                    ];
                    $this->view('categorias/categorias', $data);
                } else {
                    $data = $this->info;
                    $data += [
                        'categorias' => $this->categoriaModel->get(),
                        'estado' => "error",
                    ];
                    $this->view('categorias/categorias', $data);
                }
            } else {
                $data = $this->info;
                $data += [
                    'categorias' => $this->categoriaModel->get(),
                    'estado' => "otro",
                    'msg' => "No se han recibido todos los campos requeridos, inténtelo de nuevo",
                ];
                $this->view('categorias/categorias', $data);
            }
        } else {
            $data = $this->info;
            $data += [
                'categorias' => $this->categoriaModel->get(),
                'estado' => "otro",
                'msg' => "Este recurso no está disponible",
            ];
            $this->view('categorias/categorias', $data);
        }
    }

    public function actionEditarGuardar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['estado'], $_POST['descripcion'])) {
                $estado = $_POST['estado'];
                $descripcion = $_POST['descripcion'];
                $categoria = new Categoria($descripcion, $estado);
                $categoria->setId($id);
                if ($this->categoriaModel->actualizar($categoria)) {
                    $data = $this->info;
                    $data += [
                        'categorias' => $this->categoriaModel->get(),
                        'estado' => "editado",
                    ];
                    $this->view('categorias/categorias', $data);
                } else {
                    $data = $this->info;
                    $data += [
                        'categorias' => $this->categoriaModel->get(),
                        'estado' => "error",
                    ];
                    $this->view('categorias/categorias', $data);
                }
            } else {
                $data = $this->info;
                $data += [
                    'categorias' => $this->categoriaModel->get(),
                    'estado' => "otro",
                    'msg' => "No se han recibido todos los campos requeridos, inténtelo de nuevo",
                ];
                $this->view('categorias/categorias', $data);
            }
        } else {
            $data = $this->info;
            $data += [
                'categorias' => $this->categoriaModel->get(),
                'estado' => "otro",
                'msg' => "Este recurso no está disponible",
            ];
            $this->view('categorias/categorias', $data);
        }
    }

    public function actionEliminar($id)
    {
        if ($this->categoriaModel->eliminar($id)) {
            $data = $this->info;
            $data += [
                'categorias' => $this->categoriaModel->get(),
                'estado' => "eliminado",
            ];
            $this->view('categorias/categorias', $data);
        } else {
            $data = $this->info;
            $data += [
                'categorias' => $this->categoriaModel->get(),
                'estado' => "otro",
                'msg' => "No se puede elimina esta categoría porque hay productos que la están utilizando",
            ];
            $this->view('categorias/categorias', $data);
        }
    }
}
