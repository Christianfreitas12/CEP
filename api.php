<?php

 function getAddress () {
    //nesse if ele só vai fazer o codigo se o post do ce já ter feito.
    if ( isset ($_POST['cep'])){
        $cep= $_POST['cep']; 

        $cep = cleanCEP($cep);

            if (preg_match('/^[0-9]{8}$/', $cep) ){
                $endereco = getViacep($cep);
                // property_exists Verifica se o objeto ou classe tem uma propriedade
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
    //pega tudo o que é diferente do 0 a 9 e transforma em vazio 
    return preg_replace('/[^0-9]/', '', $cep);
}

function getViacep (string $cep){
    $url= "https://viacep.com.br/ws/{$cep}/json/";
    //json_decode — Decodifica uma string JSON
    //file_get_contents — Lê todo o conteúdo de um arquivo para uma string
    return json_decode(file_get_contents($url));
}

