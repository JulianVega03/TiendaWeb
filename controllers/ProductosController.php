<?php
require_once 'IndexController.php';
require_once 'models/CategoriaModel.php';
require_once 'models/MarcaModel.php';
include_once 'entities/Producto.php';

class ProductosController extends Controller
{
    private $productoModel;
    private $categoriaModel;
    private $marcaModel;
    private $info;

    public function __construct()
    {
        $this->productoModel = $this->model('producto');
        $this->categoriaModel = new CategoriaModel();
        $this->marcaModel = new MarcaModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex()
    {
        $data = $this->info;
        $data += [
            'productos' => $this->productoModel->get(),
            'categorias' => $this->categoriaModel->get()
        ];
        $this->view('productos', $data);
    }

    public function actionPorCategoria($idCategoria)
    {
        $data = $this->info;
        $data += [
            'productos' => $this->productoModel->getPorCategoria($idCategoria),
            'categorias' => $this->categoriaModel->get()
        ];
        $this->view('productos', $data);
    }

    public function actionListar()
    {
        $data = $this->info;
        $data += [
            'productos' => $this->productoModel->get(),
            'estado' => "normal"
        ];
        $this->view('index', $data);
    }

    public function actionAgregar()
    {
        $data = $this->info;
        $data += [
            'categorias' => $this->categoriaModel->get(),
            'marcas' => $this->marcaModel->get(),
            'estado' => "normal",
        ];
        $this->view('registrarProducto', $data);
    }

    public function actionEditar($id)
    {
        $producto = $this->productoModel->getById($id);
        $data = $this->info;
        $data += [
            'categorias' => $this->categoriaModel->get(),
            'marcas' => $this->marcaModel->get(),
            'estado' => "normal",
            'producto' => $producto,
            'id' => $id,
        ];
        $this->view("editarProducto", $data);
    }

    public function actionEditarGuardar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['upload'])) {
                if (isset($_POST['referencia'], $_POST['nombre'], $_POST['descripcion_corta'], $_POST['detalle'],
                $_POST['valor'], $_POST['palabras_clave'], $_POST['estado'], $_POST['categoria'], $_POST['marca'])) {
                    $referencia =  $_POST['referencia'];
                    $nombre = $_POST['nombre'];
                    $descripcion_corta = $_POST['descripcion_corta'];
                    $detalle = $_POST['detalle'];
                    $valor = $_POST['valor'];
                    $palabras_clave = $_POST['palabras_clave'];
                    $estado = $_POST['estado'];
                    $categoria = $_POST['categoria'];
                    $marca = $_POST['marca'];
                    $image = $_FILES['image']['name'];
                    $producto = new Producto($referencia, $nombre, $descripcion_corta, $detalle, $valor, $palabras_clave, $estado, $categoria, $marca, $image);
                    $producto->setId($id);
                    $target = "views/images/productos/" . basename($image);
                    if ($this->productoModel->editar($producto)) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                            $data = $this->info;
                            $data += [
                                'productos' => $this->productoModel->get(),
                                'estado' => "editado"
                            ];
                            $this->view('index', $data);
                        } else {
                            echo ("Failed to upload image");
                            $data = $this->info;
                            $data += [
                                'productos' => $this->productoModel->get(),
                                'estado' => "error"
                            ];
                            $this->view('index', $data);
                        }
                    } else {
                        echo ("Failed to upload image");
                        $data = $this->info;
                        $data += [
                            'productos' => $this->productoModel->get(),
                            'estado' => "error"
                        ];
                        $this->view('index', $data);
                    }
                }
            }
        } else {
            $data = $this->info;
            $data += [
                'productos' => $this->productoModel->get(),
                'estado' => "normal"
            ];
            $this->view('registrarProducto', $data);;
        }
    }

    public function actionNuevo()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['upload'])) {
                if (isset($_POST['referencia'], $_POST['nombre'], $_POST['descripcion_corta'], $_POST['detalle'],
                $_POST['valor'], $_POST['palabras_clave'], $_POST['estado'], $_POST['categoria'], $_POST['marca'])) {
                    $referencia =  $_POST['referencia'];
                    $nombre = $_POST['nombre'];
                    $descripcion_corta = $_POST['descripcion_corta'];
                    $detalle = $_POST['detalle'];
                    $valor = $_POST['valor'];
                    $palabras_clave = $_POST['palabras_clave'];
                    $estado = $_POST['estado'];
                    $categoria = $_POST['categoria'];
                    $marca = $_POST['marca'];
                    $image = $_FILES['image']['name'];
                    $producto = new Producto($referencia, $nombre, $descripcion_corta, $detalle, $valor, $palabras_clave, $estado, $categoria, $marca, $image);
                    $target = "views/images/productos/" . basename($image);
                    if ($this->productoModel->insertar($producto)) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                            $data = $this->info;
                            $data += [
                                'productos' => $this->productoModel->get(),
                                'estado' => "success"
                            ];
                            $this->view('index', $data);
                        } else {
                            echo ("Failed to upload image");
                            $data = $this->info;
                            $data += [
                                'productos' => $this->productoModel->get(),
                                'estado' => "error"
                            ];
                            $this->view('index', $data);
                        }
                    } else {
                        echo ("Failed to upload image");
                        $data = $this->info;
                        $data += [
                            'productos' => $this->productoModel->get(),
                            'estado' => "error"
                        ];
                        $this->view('index', $data);
                    }
                }
            }
        } else {
            $data = $this->info;
            $data += [
                'productos' => $this->productoModel->get(),
                'estado' => "normal"
            ];
            $this->view('registrarProducto', $data);;
        }
    }

    public function actionEliminar($id)
    {
        $this->productoModel->eliminar($id);
        $data = $this->info;
        $data += [
            'productos' => $this->productoModel->get(),
            'estado' => "eliminado"
        ];
        $this->view('index', $data);;
    }

    public function actionFiltrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $productos = $this->productoModel->get();
                $productosMatch = [];
                $palabraBusqueda = [];
                foreach (preg_split("/[\s,.;]+/", strtolower($busqueda)) as $word) {
                    $palabraBusqueda[$word] = [];
                }
                foreach ($productos as $producto) {
                    if (!in_array($producto->getId(), $productosMatch)) {
                        $palabrasNombre = preg_split("/[\s,.;]+/", strtolower($producto->getNombre()));
                        $palabrasClave = preg_split("/[\s,.;]+/", strtolower($producto->getPalabras_clave()));
                        $palabrasProducto = array_merge($palabrasNombre, $palabrasClave);
                        foreach ($palabrasProducto as $w) {
                            if (isset($palabraBusqueda[$w])) {
                                array_push($productosMatch, $producto->getId());
                                break;
                            }
                        }
                    }
                }
                $productosFiltrados = [];
                foreach ($productosMatch as $idProducto) {
                    array_push($productosFiltrados, $this->productoModel->getById($idProducto));
                }
                $data = $this->info;
                $data += [
                    'productos' => $productosFiltrados,
                    'categorias' => $this->categoriaModel->get(),
                    'busqueda' => $busqueda,
                ];
                $this->view('productos', $data);
            }
        }
    }
}
