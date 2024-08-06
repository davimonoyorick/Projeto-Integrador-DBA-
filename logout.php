<?php
session_start(); // Inicie a sessão para acessar as variáveis de sessão

// Destroi todas as variáveis de sessão
$_SESSION = array();

// Se você deseja que a sessão seja destruída completamente, também pode destruir o cookie da sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destrua a sessão
session_destroy();

// Redireciona para a página de login ou página inicial
header('Location: login.php');
exit();
?>
