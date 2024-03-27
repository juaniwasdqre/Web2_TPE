<?php

include_once './app/models/artistas.model.php';
include_once './app/views/artistas.view.php';
include_once './app/helpers/auth.helper.php';

class ArtistasController{

    private $model;
    private $view;

    function __construct(){
        AuthHelper::verify();
        $this->model = new ArtistasModel();
        // $this->view = new ArtistasView();
    }

    function showArtist(){
        $artists = $this->model->getArtists();
        $this->view->showArtists($artists);
    }

    function showAddArtist(){
        $this->view->showAddArtist();
    }

    function addArtist(){
        if(!isset($_POST['artist']) || !isset($_POST['dob']) || !isset($_POST['pob'])){
            $this->view->showError("ERROR todos los campos deben completarse.");
            return;
        }
        $artist_name = $_POST['artist'];
        $artist_dob = $_POST['dob'];
        $artist_pob= $_POST['pob'];

        $id = $this->model->addArtist($artist_name, $artist_dob, $artist_pob);

        if($id){
            header('Location: ' . BASE_URL . 'listaArtistas');
        } else {
            $this->view->showError("ERROR no se puedo agregar el artista");
        }
    }

    function removeArtist($id){
        $this->model->deleteArtist($id);
        header('Location: ' . BASE_URL . 'listaArtistas');
    }

    function showArtistasPublico(){
        $artistas = $this->model->getArtists();
        $this->view->showArtistasPublico($artistas);
    }
}