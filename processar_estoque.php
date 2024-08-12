<?php
require 'db.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Supondo que o formulário enviou os tipos de sangue e quantidades em um formato específico
    // Aqui você deve adaptar conforme o formato dos dados recebidos
    $estoques = $_POST['estoques']; // Assumindo que 'estoques' é um array de tipos e quantidades

    foreach ($estoques as $tipo_sangue => $quantidade) {
        $tipo_sangue = $mysqli->real_escape_string($tipo_sangue);
        $quantidade = (int) $quantidade;

        // Atualiza o estoque existente ou insere um novo
        $sql = "INSERT INTO estoque (tipo_sangue, quantidade) VALUES ('$tipo_sangue', $quantidade)
                ON DUPLICATE KEY UPDATE quantidade = VALUES(quantidade)";

        if (!$mysqli->query($sql)) {
            echo "Erro: " . $mysqli->error;
        }
    }

    // Redirecionar para a página de solicitações recebidas após processar
    header('Location: solicitacoes.php');
}
?>
