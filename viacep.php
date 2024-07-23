<?php

$addres = (object)[
    'cep'=>'',
    'logradouro' =>'',
    'bairro' => '',
    'localidade' =>'',
    'uf' => ''
];


if(isset($_POST['cep'])){
    $cep = $_POST['cep'];

    $cep = preg_replace('/[^0-9]/','',$cep);

    if(preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep) ){

        $url = "http://viacep.com.br/ws/{$cep}/json/";

        $addres = json_decode(file_get_contents($url));
    }

}





