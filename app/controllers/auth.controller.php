<?php
include_once './app/views/auth.view.php';
include_once './app/models/user.model.php';
include_once './app/helpers/auth.helper.php';

class AuthController {

    private $view;
    private $model;

    function __construct() {
        $this->view = new AuthView;
        $this->model = new UserModel;
    }

    function showLogin() {
        $this->view->showLogin();
    }

    function authLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($_POST['username']) || empty($_POST['password'])) {
            $this->view->showLogin("ERROR, no pudimos verificar tu identidad, AMBOS campos deben estar completos.");
            return;
        }
        //buscamos al usuario (por el nombre de usuario)! 
        $user = $this->model->getByUsername($username);
        if ($user && password_verify($password, $user->password)) {
            var_dump("paso el if"); // no pasa el if el password_verify da siempre falso aunque todo exista correctamente...
            AuthHelper::login($user);
            header('Location ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario NO ENCONTRADO');
        }
        echo "tu usuario y contraseña son $username y $password";
    }

    function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }

    function showRegister() {
        $this->view->showFormRegister();
    }

    function authRegister() {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $this->view->showFormRegister("ERROR, no pudimos verificar tu identidad, AMBOS campos deben estar completos.");
            return;
        }

        $username = $_POST['username'];

        $users = $this->model->getAllUsers();
        foreach ($users as $usuario) {
            if ($usuario->username == $username) {
                $this->view->showFormRegister("El nombre de usuario ya existe! Intenta otra vez...");
                return;
            }
        }

        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $id = $this->model->addUser($username, $hash);

        if($id){
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showFormRegister("Error. No se pudo registrar");
        }
    }
}