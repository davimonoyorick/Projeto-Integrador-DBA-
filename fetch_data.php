<?php
header('Content-Type: application/json');
require 'db.php';

$sql = "SELECT p.first_name, p.last_name, p.data_nascimento, p.sexo, c.phone, c.email, p.tipo_sangue, i.rg, i.cpf 
        FROM pessoal p 
        JOIN contato_pessoal c ON p.id = c.doador_id 
        JOIN identidade i ON p.id = i.doador_id";
$result = $mysqli->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>
