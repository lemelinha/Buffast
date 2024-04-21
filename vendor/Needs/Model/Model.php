<?php

namespace Needs\Model;
use App\Connection;

abstract class Model {
    protected $db;

    public function __construct(){
        $this->db = Connection::connect();
    }
}
