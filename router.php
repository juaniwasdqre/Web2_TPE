<?php
require_once 'app/controllers/discos.controller.php';
require_once 'app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'discos'; //accion por defecto
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

/* SITIO RESEÑAS DE DISCOS DE MUSICA */
//home          ->      taskController->showHome(); BIENVENIDA EL HOTALBUMS Y UN HEADER CON LOGIN Y TUS REVIEWS 
//agregar       ->      taskController->addAlbum();
//agregarReseña ->      taskController->addReview();
//eliminar/:ID  ->      taskController->removeAlbum($id);
//about         ->      aboutController->showAbout();
//login         ->      authController->showLogin();
//logout        ->      authController->logout();
//auth          ->      authController->auth(); // toma los datos del post y autentica al usuario

//parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'discos':
        $controller = new DiscosController();
        $controller->showDiscos();
        break;
    case 'agregar':
        $controller = new DiscosController();
        $controller->showFormDisco();
        break;
    case 'subirdisco':
        $controller = new DiscosController();
        $controller->agregarDisco();
        break;
    case 'eliminar': //eliminar/:ID
        $controller = new DiscosController();
        $id = $params[1];
        $controller->borrarDisco($id);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'authLogin':
        $controller = new AuthController();
        $controller->authLogin();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    case 'authRegister':
        $controller = new AuthController();
        $controller->authRegister();
        break;
    case 'generos':
        $controller = new DiscosController();
        $controller->showGeneros();
        break;
    case 'filtrar':
        $controller = new DiscosController();
        $controller->filtrarGenero();
        break;
    case 'loginhome':
        $controller = new DiscosController();
        $controller->showLoggedHome();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
        //FUTURO MOSTRAR LOS REVIEWS DEL USUARIO LOGEADO
    case 'detalleDisco':
        $controller = new DiscosController();
        $controller->showDetalleDiscoById($params[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('<h1>404 NOT FOUND</h1>');
        break;
}