<?php

namespace Needs\Controller;

abstract class Controller {
    protected function render($view, $directory, $layout=''){
        
        $this->page = $view;
        $this->directory = $directory;
        
        if(!empty($layout)){
            if(file_exists('../App/Layouts/' . $layout . '.php')){
                require '../App/Layouts/' . $layout . '.php';
                die();
            }
            echo "Layout $layout inexistente";
            die();
        }
        
        $this->loadView();
    }
    
    protected function loadView(){
        require 'Codes.php'; // link dos scripts (JQuery, GSap, FontAwesome)
        require '../App/Views/' . $this->directory . '/' . $this->page . '.php';

        if (isset($_SESSION['modal'])){
            echo "
                <script>
                    createModal('{$_SESSION['modal']['text']}')
                </script>
            ";
            unset($_SESSION['modal']);
        }
    }
}
