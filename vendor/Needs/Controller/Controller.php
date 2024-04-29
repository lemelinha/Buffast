<?php

namespace Needs\Controller;

abstract class Controller {
    protected function render($view, $directory, $layout=''){
        $this->page = $view;
        $this->directory = $directory;

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
        require '../App/Views/' . $this->directory . '/' . $this->page . '.php';
        die();
    }
}
