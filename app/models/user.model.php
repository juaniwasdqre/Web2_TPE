<?php
require_once 'model.php';
class UserModel extends Model {
    protected $db;

    function getByUsername($username) {
        $query = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $query->execute([$username]);
        //aca hay trae todo bien el usuario y contraseña como se lo pido
        //probado por var_dumps y funciona

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addUser($username, $hash) {
        $query = $this->db->prepare('INSERT INTO users(username, password) VALUES (?,?)');
        $query->execute([$username,$hash]);

        return $this->db->lastInsertId();
    }

    function getAllUsers() {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    
}