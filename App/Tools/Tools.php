<?php

namespace App\Tools;
use App\Connection;

abstract class Tools {
    /**
    *   Função para validação dos dados enviados de algum formulário. 
    *    
    *   Percorrendo a SuperGlobal $_POST ou $_GET e verificando cada
    *   índice com os índices declarados no array $formInputs
    *
    *   @param array $method Array de referência para superglobal $_GET ou $_POST
    *   @param array $formInputs Array com os inputs do formulário
    *                           Com cada índice sendo seu name e 
    *                           seus value sendo outro array com
    *                           o tipo de dado daquele input e 
    *                           seu comprimento máximo.
    *                           Pattern:
    *                               ["input-name" => ["type", min_length, max_length]]
    *   @param array $optionalInputs Array com Inputs não obrigatórios
    *
    *   @return bool
    */
    static public function validateFormData(&$method, $formInputs, $optionalInputs=[]) {
        if (empty($method)){
            return false;
        }

        foreach($method as $key => $value){
            if (!in_array($key, array_keys($formInputs))){
                return false;
            }

            if (empty($value) && !in_array($key, $optionalInputs)){
                return false;
            }

            if ($formInputs[$key][0] == "string" && !($formInputs[$key][1] <= strlen($value) && strlen($value) <= $formInputs[$key][2])) {
                return false;
            }

            if ($formInputs[$key][0] == "integer"){
                if (intval($value)) { // se for numero
                    
                }
                return false;
            }
        }

        return true;
    }

    /**
     *  Função para o CEP
     *  
     *  Essa função verifica os dados atrelados ao CEP
     *  e os compara com os dados passados pelo usuário
     * 
     *  @param string|int $cep CEP
     *  @param string $uf Sigla do estado
     *  @param string $localidade Cidade
     *  @param string $bairro Bairro
     *  @param string $logradouro Rua
     *  
     *  @return bool
     */
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

    /**
     *  Verifica se um usuário já existe
     * 
     *  Acessa o banco de dados para 
     *  verificar se um nome de usuário já 
     *  está em uso
     * 
     *  @param string $usuario 
     * 
     *  @return bool
     */
    static public function usernameExists($username){
        $sql = "
            SELECT 
                nm_usuario
            FROM
                tb_buffet
            WHERE 
                nm_usuario = :usuario
        ";
        $query = Connection::connect()->prepare($sql);
        $query->bindParam(':usuario', $username);
        $query->execute();

        if (empty($query->fetchAll())){
            return false;
        }

        return true;
    }
}
