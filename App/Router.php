<?php

namespace App;

abstract class Router {
    protected function declareRoutes(){
        $routes['index'] = [
            'router' => '/',
            'controller' => 'IndexController',
            'method' => 'index'
        ];

        $this->routes = $routes;
    }
}
