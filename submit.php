<?php
require 'db.php';
require 'auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $phone = $_POST['phone'];
    $phone_secundario = $_POST['phone_secundario']; // Novo campo
    $email = $_POST['email'];
    $tipo_sangue = $_POST['tipo_sangue'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $peso = $_POST['peso']; // Novo campo
    $altura = $_POST['altura']; // Novo campo
    $historico_medico = $_POST['historico_medico']; // Novo campo
    $consentimento = isset($_POST['consentimento']) ? 1 : 0; // Novo campo
    $quantidade = 1; // Aqui você pode definir a quantidade que deseja adicionar ao estoque, ou modificar para pegar do formulário.

    // Verificar se os dados já existem no banco de dados
    $check_sql = "SELECT * FROM pessoal WHERE first_name = ? AND last_name = ? AND data_nascimento = ? AND tipo_sangue = ?";
    $stmt = $mysqli->prepare($check_sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $data_nascimento, $tipo_sangue);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Inserir dados nas tabelas
        $insert_pessoal = "INSERT INTO pessoal (first_name, last_name, data_nascimento, tipo_sangue, sexo, peso, altura, historico_medico, consentimento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insert_pessoal);
        $stmt->bind_param("sssssssss", $first_name, $last_name, $data_nascimento, $tipo_sangue, $sexo, $peso, $altura, $historico_medico, $consentimento);
        $stmt->execute();
        $doador_id = $stmt->insert_id;

        $insert_contato = "INSERT INTO contato_pessoal (doador_id, phone, phone_secundario, email) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insert_contato);
        $stmt->bind_param("isss", $doador_id, $phone, $phone_secundario, $email);
        $stmt->execute();

        $insert_identidade = "INSERT INTO identidade (doador_id, rg, cpf) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($insert_identidade);
        $stmt->bind_param("iss", $doador_id, $rg, $cpf);
        $stmt->execute();

        // Inserir dados na tabela estoque
        $insert_estoque = "INSERT INTO estoque (tipo_sangue, quantidade,doador_id) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($insert_estoque);
        $stmt->bind_param("sii", $tipo_sangue, $quantidade,$doador_id);
        $stmt->execute();

        echo "Dados inseridos com sucesso!";
    } else {
        echo "Os dados já existem no banco de dados.";
    }
}
?>
