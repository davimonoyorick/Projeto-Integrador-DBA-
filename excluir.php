<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Inicia a transação
    $mysqli->begin_transaction();
    try {
        // Excluir da tabela contato_pessoal
        $sql_contato = "DELETE FROM contato_pessoal WHERE doador_id = ?";
        if ($stmt_contato = $mysqli->prepare($sql_contato)) {
            $stmt_contato->bind_param('i', $id);
            $stmt_contato->execute();
            $stmt_contato->close();
        } else {
            throw new Exception('Erro ao preparar a exclusão na tabela contato_pessoal');
        }

        // Excluir da tabela identidade
        $sql_identidade = "DELETE FROM identidade WHERE doador_id = ?";
        if ($stmt_identidade = $mysqli->prepare($sql_identidade)) {
            $stmt_identidade->bind_param('i', $id);
            $stmt_identidade->execute();
            $stmt_identidade->close();
        } else {
            throw new Exception('Erro ao preparar a exclusão na tabela identidade');
        }

        // Excluir da tabela pessoal
        $sql_pessoal = "DELETE FROM pessoal WHERE id = ?";
        if ($stmt_pessoal = $mysqli->prepare($sql_pessoal)) {
            $stmt_pessoal->bind_param('i', $id);
            $stmt_pessoal->execute();
            $stmt_pessoal->close();
        } else {
            throw new Exception('Erro ao preparar a exclusão na tabela pessoal');
        }

        // Commit da transação
        $mysqli->commit();
        header('Location: result.php?message=success');
    } catch (Exception $e) {
        // Rollback da transação em caso de erro
        $mysqli->rollback();
        echo 'Falha ao excluir o doador: ',  $e->getMessage();
    }
} else {
    echo 'ID não especificado.';
}
?>
