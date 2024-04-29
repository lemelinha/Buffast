<?php

namespace App;
use PDO;

abstract class Connection {
    public static function connect(){
        $host = $_ENV['HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pwd = $_ENV['DB_PASSWORD'];
        $port = $_ENV['DB_PORT'];

        $conn = new PDO("mysql:server=$host;port={$port};dbname=$dbname", $user, $pwd);
        return $conn;
    }
}
