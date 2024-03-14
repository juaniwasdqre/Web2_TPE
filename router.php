<?php
require_once './app/controllers/task.controller.php';
// require_once './app/controllers/about.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; //accion por defecto
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
    case 'home':
        $controller = new TaskController();
        $controller->showHome();
        break;
    case 'agregar':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'eliminar': //eliminar/:ID
        $controller = new TaskController();
        $id = $params[1];
        $controller->deleteTask($id);
        break;
    case 'finalizar':
        $controller = new TaskController();
        $controller->completeTask();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('<h1>404 NOT FOUND</h1>');
        break;
}