<?php
include_once './config.php';
class Model {
    protected $db;

    function __construct() {
        //ES LO MISMO DE SIEMPRE PERO CON EL CODIGO TRAIDO DE OTRO LADO (CONFIG.PHP) ES LO MISMO DE SIEMPREEE
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }
    
    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql =<<<END
        }
    }
}