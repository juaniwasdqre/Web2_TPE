<?php
class DiscosView {
    function showDiscos($discos) {
        require_once 'templates/header.php';
        require_once 'templates/form_alta.php';
        
        echo "<ul class='list-group mt-5'>";
        foreach ($discos as $disco) {
            echo "<li class='list-group-item'>
                    $disco->title | $disco->artist | $disco->dyear | $disco->producer | $disco->genre
                    <a class='btn btn-danger btn-sm' href='eliminar/$disco->album_id'>ELIMINAR</a>
                </li>";
        }
        echo "</ul>";
    }

    function showError($msg) {
        echo "<h1>ERROR!</h1>";
        echo "<h2> $msg </h2>";
    }
}