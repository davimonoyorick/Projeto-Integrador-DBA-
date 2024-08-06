<?php
require 'db.php';

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['tipo_usuario'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha seu e-mail</div>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha sua senha</div>";
    } else if (strlen($_POST['tipo_usuario']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Selecione o tipo de usuário</div>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $tipo_usuario = $mysqli->real_escape_string($_POST['tipo_usuario']);

        // Definindo a tabela com base no tipo de usuário
        switch ($tipo_usuario) {
            case 'doador':
                $tabela = 'pessoal'; // Substitua por sua tabela de doadores, se for diferente
                break;
            case 'adm':
                $tabela = 'funcionario';
                break;
            case 'hospital':
                $tabela = 'hospital';
                break;
            default:
                echo "<div class='alert alert-warning' role='alert'>Tipo de usuário inválido</div>";
                exit();
        }

        // Consulta SQL ajustada com base na tabela selecionada
        $sql_code = "SELECT * FROM $tabela WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id"] = $usuario['id'];
            $_SESSION["nome"] = $usuario['nome'];
            $_SESSION["tipo_usuario"] = $tipo_usuario; // Adiciona o tipo de usuário na sessão

            // Redireciona com base no tipo de usuário
            if ($tipo_usuario == 'adm') {
                header("Location: login_funcionarios.php");
            } else if ($tipo_usuario == 'hospital') {
                header("Location: hospital_home.php");
            } else {
                header("Location: doador_home.php");
            }
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
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login-style.css">
    <style>
        .user-type-buttons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .user-type-buttons label {
            flex: 1;
            text-align: center;
        }
        .user-type-buttons input[type="radio"] {
            display: none;
        }
        .user-type-buttons input[type="radio"] + span {
            display: inline-block;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }
        .user-type-buttons input[type="radio"]:checked + span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
</head>
<body style="background-color:#6b0c0c;">
    <div class="login-form">
        <h2 class="text-center">Login</h2>
        <form action="" method="post">
            <div class="user-type-buttons">
                <label>
                    <input type="radio" name="tipo_usuario" value="doador" required>
                    <span>Doador</span>
                </label>
                <label>
                    <input type="radio" name="tipo_usuario" value="adm" required>
                    <span>Colaborador</span>
                </label>
                <label>
                    <input type="radio" name="tipo_usuario" value="hospital" required>
                    <span>Hospital</span>
                </label>
            </div>
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
