<?php
$host = 'localhost'; // ou o host do seu servidor de banco de dados
$user = 'root'; // seu usuário do MySQL
$password = ''; // sua senha do MySQL
$database = 'banco_de_sangue'; // nome do seu banco de dados

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Erro de conexão (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
}
?>

