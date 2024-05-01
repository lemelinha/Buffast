<?php

namespace App;

abstract class Router {
    protected function declareRoutes(){
        $routes['index'] = [
            'router' => '/',
            'controller' => 'IndexController',
            'method' => 'index'
        ];

        $routes['login'] = [
            'router' => '/login',
            'controller' => 'LoginController',
            'method' => 'index'
        ];

        $routes['loginAuth'] = [
            'router' => '/login/auth',
            'controller' => 'LoginController',
            'method' => 'auth'
        ];

        $this->routes = $routes;
    }
}
