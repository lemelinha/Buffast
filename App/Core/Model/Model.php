<?php

namespace Core\Model;
use App\Connection;

abstract class Model {
    public function getPDO(){
        return Connection::connect();
    }

    protected function executeStatement($sql, $params=[]){
        $query = self::getPDO()->prepare($sql);

        $query->execute($params);
        return $query;
    }
}
