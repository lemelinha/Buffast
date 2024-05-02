<?php

namespace App;

abstract class Router {
    protected function declareRoutes(){
        $routes['index'] = [
            'router' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        ];

        $routes['login'] = [
            'router' => '/login',
            'controller' => 'LoginController',
            'action' => 'index'
        ];

        $routes['loginAuth'] = [
            'router' => '/login/auth',
            'controller' => 'LoginController',
            'action' => 'auth'
        ];

        // Área de Admin
        $routes['AdminDashboard'] = [
            'router' => '/admin/dashboard',
            'controller' => 'AdminController',
            'action' => 'dashboard'
        ];

        $routes['AdminCadastroBuffet'] = [
            'router' => '/admin/cadastrar/buffet',
            'controller' => 'AdminController',
            'action' => 'registerBuffet'
        ];

        $this->routes = $routes;
    }
}
