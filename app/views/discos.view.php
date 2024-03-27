<?php
class DiscosView {
    function showDiscos($discos) {
        $count = count($discos);
        require 'templates/discosList.phtml';
        /* require_once 'templates/header.phtml';
        require_once 'templates/form_alta.php';
        
        echo "<div class='container'>
                <ul class='list-group mt-5'>
                <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3'>";
        foreach ($discos as $disco) {
            echo "<div class='col'>
                    <div class='card shadow-sm'>";
                echo '<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>';
                echo "<div class='card-body'";
                    echo "<li class='list-group-item'>
                            $disco->title | $disco->artist | $disco->dyear | $disco->producer | $disco->genre
                            <a class='btn btn-danger btn-sm' href='eliminar/$disco->album_id'>ELIMINAR</a>
                        </li>";
                echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        echo "</ul>";
        echo "</div>"; */
    }

    function showError($msg) {
        echo "<h1>ERROR!</h1>";
        echo "<h2> $msg </h2>";
    }

    function showGeneros($generos) {
        require './templates/generos.phtml';
    }

    function showAdminMenu() {
        require './templates/adminmenu.phtml';
    }
}