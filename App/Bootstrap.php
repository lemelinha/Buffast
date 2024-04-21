<?php

namespace App;

class Bootstrap extends Router{
    public function __construct(){
        $this->declareRoutes();
        $uri = $this->getUri();
        if(str_ends_with($uri, '/') && $uri != '/') {
            $uri = rtrim($uri, '/');
            header("Location: $uri");
            die();
        }
        $this->run($uri);
    }

    private function run($uri){
        foreach($this->routes as $key => $router){
            if ($uri == $router['router']){
                $controllerClass = 'App\\Controllers\\' . $router['controller'];
                $method = $router['method'];

                $controllerInstance = new $controllerClass();
                $controllerInstance->$method();
            } 
        }
    }

    private function getUri(){
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
