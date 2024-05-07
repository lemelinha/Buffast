<?php

namespace App\Tools;

abstract class Tools {
    static public function validateFormData($formInputs, $optionalInputs=[]) {
        foreach($_GET as $key => $value){
            if (!in_array($key, $formInputs)){
                return false;
            }

            if (empty($value) && !in_array($key, $optionalInputs)){
                return false;
            }
        }

        return true;
    }
}
