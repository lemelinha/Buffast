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
        $routes['AdminIndex'] = [
            'router' => '/admin',
            'controller' => 'AdminController',
            'action' => 'index'
        ];

        $routes['AdminDashboard'] = [
            'router' => '/admin/dashboard',
            'controller' => 'AdminController',
            'action' => 'dashboard'
        ];

        $routes['AdminCadastroBuffetForm'] = [ // formulario de cadastro
            'router' => '/admin/buffet/register/form',
            'controller' => 'AdminController',
            'action' => 'registerBuffetForm'
        ];

        $routes['AdminCadastrarBuffet - AJAX'] = [ // validacao e registro dos dados
            'router' => '/admin/buffet/register',
            'controller' => 'AdminController',
            'action' => 'registerBuffet'
        ];

        $routes['Teste'] = [ 
            'router' => '/nome/[a-z]+/id/[0-9]+',
            'params' => ['nome', 'id'],
            'controller' => 'AdminController',
            'action' => 'registerBuffet'
        ];

        $this->routes = $routes;
    }
}
