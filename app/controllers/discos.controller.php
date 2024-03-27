<?php
include_once './app/models/discos.model.php';
include_once './app/views/discos.view.php';
include_once './app/helpers/auth.helper.php';

class DiscosController {
    private $model;
    private $view;

    function __construct() {
        AuthHelper::verify();
        $this->model = new DiscosModel();
        $this->view = new DiscosView();
    }

    function showDiscos() {
        //muestra recomendados

        //obntiene los discos del modelo
        $discos = $this->model->getDiscos();

        //se actualiza la vista
        $this->view->showDiscos($discos);
    }

    function agregarDisco() {
        $titulo = $_POST['titulo'];
        $artista = $_POST['artista'];
        $year = $_POST['year'];
        $producer = $_POST['producer'];
        $genre = $_POST['genre'];

        var_dump($_POST);
        var_dump($_FILES);
        die();

        //verifico campos obligatorios
        if (empty($titulo) || empty($artista)) {
            $this->view->showError("Faltan datos obligatorios");
            die();
        }

        //inserto el disco en la base de datos
        $id = $this->model->agregarDisco($titulo, $artista, $year, $producer, $genre);

        //redirigimos al listado
        header("Location: " . BASE_URL);
        
    }

    function borrarDisco($id) {
        $this->model->borrarDisco($id);

        //redirigimos al listado
        header("Location: " . BASE_URL);
    }

    function showGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->showGeneros($generos);
    }

    function filtrarGenero() {
        //por $_POST el genero y lo guardo
        $genero = $_POST['genre'];
        if ($genero=="Todos") {
            $discos = $this->model->getDiscos();
            $this->view->showDiscos($discos);
        } else {
            $discos = $this->model->getByGenre($genero);
            $this->view->showDiscos($discos);
        }

        if (count($discos)==0) {
            $error="NO HAY DISCOS";
        }
    }

    function showLoggedHome() {
        $this->view->showAdminMenu();
    }
}