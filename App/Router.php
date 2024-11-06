<?php
/**
 *  Este arquivo faz referência a declaração das rotas
 * do projeto
 *  
 */
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
            'action' => 'index',
            'method' => ['GET']
        ];

        $routes['login'] = [
            'router' => '/login',
            'controller' => 'IndexController',
            'action' => 'index',
            'method' => ['GET']
        ];

        $routes['loginAuth'] = [
            'router' => '/login/auth',
            'controller' => 'IndexController',
            'action' => 'auth',
            'method' => ['GET']
        ];

        $this->routes = $routes;
    }
}
