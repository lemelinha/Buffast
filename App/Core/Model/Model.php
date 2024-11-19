<?php

namespace Core\Model;
use App\Connection;

abstract class Model {
    public static function getPDO(){
        return Connection::connect();
    }

    protected static function executeStatement($sql, $params=[]){
        $query = self::getPDO()->prepare($sql);

        $query->execute($params);
        return $query;
    }
}
