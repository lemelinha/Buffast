<?php

namespace Core\Model;
use App\Connection;

abstract class Model {
    protected $db;

    public function getPDO(){
        return Connection::connect();
    }

    protected function executeStatement($sql, $params=[]){
        $query = $this->db->prepare($sql);

        $query->execute($params);
        return $query;
    }
}
