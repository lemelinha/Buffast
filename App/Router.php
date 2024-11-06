<?php
namespace App;

/**
 *  Classe referente às rotas do projeto.
 * 
 */
abstract class Router {
    protected $routes;
    /**
     *  Função de declaração de rotas
     * 
     *  Esta função declara as rotas do projeto e
     *  armazena no atributo 'routes' da instância
     * 
     *  @return void
     */
    protected function declareRoutes(){
        $routes['index'] = [
            'router' => '/',
            'controller' => 'IndexController',
            'action' => 'Index',
            'method' => ['GET']
        ];

        $routes['login'] = [
            'router' => '/login',
            'controller' => 'IndexController',
            'action' => 'Login',
            'method' => ['GET']
        ];

        $routes['loginAuth'] = [
            'router' => '/login/auth',
            'controller' =>'IndexController',
            'action' => 'LoginAuth',
            'method' => ['POST']
        ];

        $routes['painel'] = [
            'router' => '/painel',
            'controller' =>'AdminController',
            'action' => 'Index',
            'method' => ['GET']
        ];

        $this->routes = $routes;
    }
}
