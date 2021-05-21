<?php
require 'models/AdministradorModel.php';
require_once 'IndexController.php';
class LoginController extends Controller
{

    private $adminModel;
    private $info;

    public function __construct()
    {
        $this->adminModel = new AdministradorModel();
        $this->info = (new IndexController)->obtenerInfo();
    }

    public function actionIndex()
    {
        $data = $this->info;
        $this->view('login', $data);
    }

    public function actionValidar()
    {
        if (isset($_POST['user'], $_POST['pass'])) {
            session_start();

            $username = $_POST['user'];
            $pass = $_POST['pass'];

            if ($this->adminModel->validarInicioSesion($username, $pass)->getNombres() != null) {
                $_SESSION['user'] = $username;
                $_SESSION['user_name'] = $this->adminModel->validarInicioSesion($username, $pass)->getNombres();
                header('location: ' . URL . 'welcome');
            } else {
                echo "error";
            }
        } else {
            header('location: ' . URL . 'login');
        }
    }

    public function actionLogout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: ' . URL . 'login');
    }
}
