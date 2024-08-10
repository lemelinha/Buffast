<?php

namespace App\Controllers;
use Core\Controller\Controller;

class IndexController extends Controller {
    public function index(){
        $this->renderView('index');
    }
}
