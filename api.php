<?php

 function getAddress () {
    if ( isset ($_POST['cep'])){
        $cep= $_POST['cep']; 

        $cep = cleanCEP($cep);

            if (preg_match('/^[0-9]{8}$/', $cep) ){
                $endereco = getViacep($cep);
                if (property_exists($endereco, 'erro') ){
                    $endereco = emptyFields();
                    $endereco->cep = "CEP não encontrado!";
                }
            }else { 
                $endereco = emptyFields();
                $endereco->cep = "CEP inválido!";
            }
    }else {
        $endereco = emptyFields();
    }

    return $endereco;
}

function emptyFields(){
    return (object)[
        'cep' => '',
        'logradouro' => '',
        'bairro' => '',
        'localidade' => '',
        'uf' => ''
    ];
} 

function cleanCEP (String $cep):String {
    return preg_replace('/[^0-9]/', '', $cep);
}

function getViacep (string $cep){
    $url= "https://viacep.com.br/ws/{$cep}/json/";
    return json_decode(file_get_contents($url));
}

