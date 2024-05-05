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

        $routes['AdminCadastroBuffetForm'] = [ // formulario de cadastro
            'router' => '/admin/buffet/form',
            'controller' => 'AdminController',
            'action' => 'registerBuffetForm'
        ];

        $routes['AdminCadastrarBuffet - AJAX'] = [ // validacao e registro dos dados
            'router' => '/admin/buffet/register',
            'controller' => 'AdminController',
            'action' => 'registerBuffet'
        ];

        $this->routes = $routes;
    }
}
