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

        $routes['cardapio temp'] = [ //temporario
            'router' => '/cardapio',
            'controller' => 'IndexController',
            'action' => 'temp',
            'method' => ['GET']
        ];

        $routes['cardapio'] = [ 
            'router' => '/cardapio/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}',
            'controller' => 'IndexController',
            'action' => 'Cardapio',
            'method' => ['GET'],
            'params' => ['cd_buffet']
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

        $routes['reenviar email autentificacao'] = [
            'router' => '/reenviar-email-autentificacao',
            'controller' =>'AdminController',
            'action' => 'ReenviarEmailAutentificacao',
            'method' => ['GET']
        ];

        $routes['validar registro'] = [
            'router' => '/validate/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}',
            'controller' =>'AdminController',
            'action' => 'Validate',
            'method' => ['GET'],
            'params' => ['id']
        ];

        $routes['esqueci minha senhaaaa'] = [
            'router' => '/esqueci-minha-senha',
            'controller' =>'IndexController',
            'action' => 'EsqueciMinhaSenha',
            'method' => ['GET', 'POST']
        ];

        $routes['redefinit senhaaaa'] = [
            'router' => '/redefinir-senha/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}/[0-9]+',
            'controller' =>'IndexController',
            'action' => 'RedefinirSenha',
            'method' => ['GET', 'POST'],
            'params' => ['cd_buffet', 'time']
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

        $routes['produtos deletar'] = [
            'router' => '/painel/produtos/deletar/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}',
            'controller' =>'AdminController',
            'action' => 'DeletarProduto',
            'method' => ['POST'],
            'params' => ['cd_produto']
        ];

        $routes['painel festas'] = [
            'router' => '/painel/festas',
            'controller' =>'AdminController',
            'action' => 'Festas',
            'method' => ['GET']
        ];

        $routes['festa cadastrar'] = [
            'router' => '/painel/festas/cadastrar',
            'controller' =>'AdminController',
            'action' => 'CadastrarFesta',
            'method' => ['POST']
        ];

        $routes['festa alterar'] = [
            'router' => '/painel/festas/alterar',
            'controller' =>'AdminController',
            'action' => 'AlterarFesta',
            'method' => ['POST']
        ];

        $routes['festa deletar'] = [
            'router' => '/painel/festas/deletar/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}',
            'controller' =>'AdminController',
            'action' => 'DeletarFesta',
            'method' => ['POST'],
            'params' => ['cd_festa']
        ];

        $routes['painel estoque'] = [
            'router' => '/painel/estoque',
            'controller' =>'AdminController',
            'action' => 'Estoque',
            'method' => ['GET']
        ];

        $routes['painel saida/entrada'] = [
            'router' => '/painel/estoque/[se]/[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}/[0-9]+',
            'controller' =>'AdminController',
            'action' => 'EstoqueProcess',
            'method' => ['POST'],
            'params' => ['type', 'cd_produto', 'quantidade']
        ];

        $routes['painel mesas'] = [
            'router' => '/painel/mesas',
            'controller' =>'AdminController',
            'action' => 'Mesas',
            'method' => ['GET']
        ];

        $routes['painel mesas cadastrar'] = [
            'router' => '/painel/mesas/cadastrar',
            'controller' =>'AdminController',
            'action' => 'CadastrarMesa',
            'method' => ['POST']
        ];

        $routes['painel pedidos'] = [
            'router' => '/painel/pedidos',
            'controller' =>'AdminController',
            'action' => 'Pedidos',
            'method' => ['GET']
        ];

        $routes['painel perfil'] = [
            'router' => '/painel/perfil',
            'controller' =>'AdminController',
            'action' => 'Perfil',
            'method' => ['GET']
        ];

        $routes['painel perfil atualizar pfp'] = [ // ajax
            'router' => '/painel/perfil/atualizar-pfp',
            'controller' =>'AdminController',
            'action' => 'AtualizarPFP',
            'method' => ['POST']
        ];

        $routes['painel perfil atualizar info'] = [ // ajax
            'router' => '/painel/perfil/atualizar-info',
            'controller' =>'AdminController',
            'action' => 'AtualizarInfo',
            'method' => ['POST']
        ];

        $routes['painel perfil atualizar senha'] = [ // ajax
            'router' => '/painel/perfil/atualizar-senha',
            'controller' =>'AdminController',
            'action' => 'AtualizarSenha',
            'method' => ['POST']
        ];

        $this->routes = array_merge($this->routes, $routes);
    }
}
