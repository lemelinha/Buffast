<?php

namespace Needs\Controller;

abstract class Controller {
    protected $view;

    public function __construct(){
        $this->view = new \stdClass();
    }

    protected function render($view, $directory, $layout=''){
        $this->view->page = $view;
        $this->view->directory = $directory;

        if(!empty($layout)){
            if(file_exists('../App/Layouts/' . $layout . '.php')){
                require '../App/layouts/' . $layout . '.php';
                die();
            }
            echo "Layout $layout inexistente";
            die();
        }

        $this->loadView();
    }

    protected function loadView(){
        require '../App/Views/' . $this->view->directory . '/' . $this->view->page . '.php';
        die();
    }
}
