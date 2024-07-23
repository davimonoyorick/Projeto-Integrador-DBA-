<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $tipo_sangue = $_POST['tipo_sangue'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    // Verificar se os dados já existem no banco de dados
    $check_sql = "SELECT * FROM pessoal WHERE first_name = ? AND last_name = ? AND data_nascimento = ? AND tipo_sangue = ?";
    $stmt = $mysqli->prepare($check_sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $data_nascimento, $tipo_sangue);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Inserir dados nas tabelas
        $insert_pessoal = "INSERT INTO pessoal (first_name, last_name, data_nascimento, tipo_sangue, sexo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insert_pessoal);
        $stmt->bind_param("sssss", $first_name, $last_name, $data_nascimento, $tipo_sangue, $sexo);
        $stmt->execute();
        $doador_id = $stmt->insert_id;

        $insert_contato = "INSERT INTO contato_pessoal (doador_id, phone, email) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($insert_contato);
        $stmt->bind_param("iss", $doador_id, $phone, $email);
        $stmt->execute();

        $insert_identidade = "INSERT INTO identidade (doador_id, rg, cpf) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($insert_identidade);
        $stmt->bind_param("iss", $doador_id, $rg, $cpf);
        $stmt->execute();

        echo "Dados inseridos com sucesso!";
    } else {
        echo "Os dados já existem no banco de dados.";
    }
}
?>
