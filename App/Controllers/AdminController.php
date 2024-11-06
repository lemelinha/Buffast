<?php

namespace App\Controllers;
use Core\Controller\Controller;

class AdminController extends Controller {
    public function Index() {
        $this->render('main', 'AdminLayout', 'Admin');
    }
}
