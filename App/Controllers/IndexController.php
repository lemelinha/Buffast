<?php

namespace App\Controllers;
use Core\Controller\Controller;

class IndexController extends Controller { 
    public function Index() {
        $this->renderView('landing');
    }
    
    public function Login() {
        $this->renderView('login');
    }
}
