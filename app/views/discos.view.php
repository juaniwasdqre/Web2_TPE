<?php
class DiscosView {
    function showDiscos($discos) {
        $count = count($discos);
        require 'templates/discosList.phtml';
    }

    function showFormDisco() {
        require './templates/form_alta.php';
    }

    function showError($msg) {
        echo "<h1>ERROR!</h1>";
        echo "<h2> $msg </h2>";
    }

    function showDetalleDisco($disco) {
        require './templates/detalleDisco.phtml';
    }
    
    function showGeneros($generos) {
        require './templates/generos.phtml';
    }

    function showAdminMenu() {
        require './templates/adminmenu.phtml';
    }

    
}