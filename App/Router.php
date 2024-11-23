<?php
namespace App;

/**
 *  Classe referente às rotas do projeto.
 * 
 */
abstract class Router {
    protected $routes = [];
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

        $routes['registro'] = [
            'router' => '/registro',
            'controller' => 'IndexController',
            'action' => 'Registro',
            'method' => ['GET', 'POST']
        ];

        // $routes['send email'] = [
        //     'router' => '/email',
        //     'controller' =>'IndexController',
        //     'action' => 'Registro',
        //     'method' => ['GET']
        // ];

        $routes['logout'] = [
            'router' => '/logout',
            'controller' =>'IndexController',
            'action' => 'Logout',
            'method' => ['GET']
        ];

        $this->AdminRoutes();

        $this->routes = array_merge($this->routes, $routes);
    }

    private function AdminRoutes() {
        $routes['painel'] = [
            'router' => '/painel/produtos',
            'controller' =>'AdminController',
            'action' => 'Produtos',
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

        $this->routes = array_merge($this->routes, $routes);
    }
}
