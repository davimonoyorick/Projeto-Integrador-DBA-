<?php
header('Content-Type: application/json');
require 'db.php';

$sql = "SELECT p.id, p.first_name, p.last_name, p.data_nascimento, p.sexo, p.tipo_sangue, p.peso, p.altura, p.historico_medico, p.consentimento, 
               c.phone, c.phone_secundario, c.email, i.rg, i.cpf, 
               e.tipo_sangue AS estoque_tipo_sangue, e.quantidade, CONCAT(p.first_name, ' ', p.last_name) AS doador_nome
        FROM pessoal p 
        JOIN contato_pessoal c ON p.id = c.doador_id 
        JOIN identidade i ON p.id = i.doador_id
        LEFT JOIN estoque e ON p.id = e.doador_id";
$result = $mysqli->query($sql);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>
