<?php

namespace App;

abstract class Connection {
    public static function connect(){
        $host = 'localhost';
        $dbname = 'db_buffet';
        $user = 'root';
        $pwd = '';

        $conn = new \PDO("mysql:server=$host;dbname=$dbname", $user, $pwd);
        return $conn;
    }
}
