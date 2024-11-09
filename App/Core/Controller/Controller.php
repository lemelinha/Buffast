<?php

namespace Core\Controller;

abstract class Controller {
    protected $page;
    protected $viewVars = [];
    
    /**
     * Define variáveis para serem usadas na view
     * @param string|array $name Nome da variável ou array associativo de variáveis
     * @param mixed $value Valor da variável (opcional se $name for array)
     */
    protected function set($name, $value = null) {
        if (is_array($name)) {
            $this->viewVars = array_merge($this->viewVars, $name);
        } else {
            $this->viewVars[$name] = $value;
        }
    }
    
    /**
     * Renderiza um layout com uma view
     * @param string $view Nome da view
     * @param string $layout Nome do layout
     * @param string $viewDirectory Diretório da view
     * @param string $layoutDirectory Diretório do layout
     * @param array $vars Variáveis adicionais para a view (opcional)
     */
    protected function render($view, $layout, $viewDirectory = '', $layoutDirectory = '', array $vars = []) {
        $this->page = new \stdClass();
        $this->page->view = $view;
        $this->page->viewDirectory = $viewDirectory;
        
        // Mescla variáveis passadas diretamente com as definidas pelo set()
        $this->viewVars = array_merge($this->viewVars, $vars);
        
        if (file_exists('../App/Layouts/' . $layoutDirectory . '/' . $layout . '.php')) {
            // Extrai variáveis para ficarem disponíveis no escopo do layout
            extract($this->viewVars);
            require '../App/Layouts/' . $layoutDirectory . '/' . $layout . '.php';
        } else {
            echo "Layout $layout inexistente";
        }
    }

    /**
     * Renderiza apenas um layout
     * @param string $layout Nome do layout
     * @param string $directory Diretório do layout
     * @param array $vars Variáveis para o layout (opcional)
     */
    protected function renderLayout($layout, $directory = '', array $vars = []) {
        if (file_exists('../App/Layouts/' . $directory . '/' . $layout . '.php')) {
            extract(array_merge($this->viewVars, $vars));
            require '../App/Layouts/' . $directory . '/' . $layout . '.php';
        } else {
            echo "Layout $layout inexistente";
        }
    }
    
    /**
     * Renderiza apenas uma view
     * @param string $view Nome da view
     * @param string $directory Diretório da view
     * @param array $vars Variáveis para a view (opcional)
     */
    protected function renderView($view, $directory = '', array $vars = []) {
        if (file_exists('../App/Views/' . $directory . '/' . $view . '.php')) {
            extract(array_merge($this->viewVars, $vars));
            require '../App/Views/' . $directory . '/' . $view . '.php';
        } else {
            echo "View $view inexistente";
        }
    }
}