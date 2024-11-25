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

        $routes['reenviar email'] = [
            'router' => '/reenviar-email',
            'controller' =>'AdminController',
            'action' => 'ReenviarEmail',
            'method' => ['GET']
        ];

        $routes['validar registro'] = [
            'router' => '/validate/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}',
            'controller' =>'AdminController',
            'action' => 'Validate',
            'method' => ['GET'],
            'params' => ['id']
        ];

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
        $routes['produtos'] = [
            'router' => '/painel/produtos',
            'controller' =>'AdminController',
            'action' => 'Produtos',
            'method' => ['GET']
        ];

        $routes['produtos cadastrar'] = [
            'router' => '/painel/produtos/cadastrar',
            'controller' =>'AdminController',
            'action' => 'CadastrarProduto',
            'method' => ['POST']
        ];

        $routes['produtos alterar'] = [
            'router' => '/painel/produtos/alterar',
            'controller' =>'AdminController',
            'action' => 'AlterarProduto',
            'method' => ['POST']
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
