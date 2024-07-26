<?php
// Inicia a sessão se ainda não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário não está logado
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: index.php");
    exit(); // Garante que o código abaixo não será executado após o redirecionamento
}
