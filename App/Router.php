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

        $routes['painel festas'] = [
            'router' => '/painel/festas',
            'controller' =>'AdminController',
            'action' => 'Festas',
            'method' => ['GET']
        ];

        $routes['painel estoque'] = [
            'router' => '/painel/estoque',
            'controller' =>'AdminController',
            'action' => 'Estoque',
            'method' => ['GET']
        ];

        $routes['painel mesas'] = [
            'router' => '/painel/mesas',
            'controller' =>'AdminController',
            'action' => 'Mesas',
            'method' => ['GET']
        ];

        $routes['painel pedidos'] = [
            'router' => '/painel/pedidos',
            'controller' =>'AdminController',
            'action' => 'Pedidos',
            'method' => ['GET']
        ];

        $this->routes = $routes;
    }
}
