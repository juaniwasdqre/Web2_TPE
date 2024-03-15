<?php
require_once 'config.php';

class DBHelper {
    public static function connectDB() {
        return new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }
}