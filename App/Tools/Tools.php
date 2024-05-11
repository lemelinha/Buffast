<?php

namespace App\Tools;

abstract class Tools {
    static public function validateFormData($formInputs, $optionalInputs=[]) {
        if (empty($_POST)){
            return false;
        }
        foreach($_POST as $key => $value){
            if (!in_array($key, $formInputs)){
                return false;
            }

            if (empty($value) && !in_array($key, $optionalInputs)){
                return false;
            }
        }

        return true;
    }

    static public function validadeCEP($cep, $uf, $localidade, $bairro, $logradouro){
        $api = "https://viacep.com.br/ws/$cep/json/";
        $data = json_decode(file_get_contents($api));

        if (!empty($data->uf) && $data->uf != $uf) {
            return false;
        }

        if (!empty($data->localidade) && $data->localidade != $localidade) {
            return false;
        }

        if (!empty($data->bairro) && $data->bairro != $bairro) {
            return false;
        }

        if (!empty($data->logradouro) && $data->logradouro != $logradouro) {
            return false;
        }

        return true;
    }
}
