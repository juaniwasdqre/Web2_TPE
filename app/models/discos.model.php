<?php
class DiscosModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_melloman;charset=utf8', 'root', '');
    }

    /* obtiene y devuelve la base de datos con LOS DISCOS */
    function getDiscos() {
        $query = $this->db->prepare('SELECT * FROM discos');
        $query->execute();
        //envia la consulta prepare y execute

        //$discos es un arreglo de discos
        //y obtengo la respuesta con un fetchAll
        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }

    /* INSERTA un nuevo disco (solo admin) */
    function agregarDisco($title, $artist, $year, $producer, $genre) {
        $query = $this->db->prepare('INSERT INTO discos (title,artist,dyear,producer,genre) VALUES(?,?,?,?,?)');
        $query->execute([$title, $artist, $year, $producer, $genre]);

        return $this->db->lastInsertId();
    }

    function borrarDisco($id) {
        $query = $this->db->prepare('DELETE FROM discos WHERE id = ?');
        $query->execute([$id]);
    }
}