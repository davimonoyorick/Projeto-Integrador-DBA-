<?php
require 'db.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha seu e-mail</div>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha sua senha</div>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM funcionario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id"] = $usuario['id'];
            $_SESSION["nome"] = $usuario['nome'];

            header("Location: home.php");
            exit(); // Garantir que o redirecionamento ocorra imediatamente
        } else {
            echo "<div class='alert alert-danger' role='alert'>Falha ao logar! E-mail ou senha incorretos</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form h2 {
            margin-bottom: 20px;
        }
        .login-form .form-group {
            margin-bottom: 20px;
        }
        .login-form .btn {
            margin-bottom: 20px;
        }
        .login-form .register-link {
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2 class="text-center">Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Acesse sua conta</button>
        </form>
        <a href="index.php#steps" class="register-link">Não possuo cadastro</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
