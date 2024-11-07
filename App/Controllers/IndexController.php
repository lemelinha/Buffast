<?php

namespace App\Controllers;
use Core\Controller\Controller;

class IndexController extends Controller { 
    public function Index() {

    }
    
    public function Login() {
        $this->renderView('login');
    }
}
