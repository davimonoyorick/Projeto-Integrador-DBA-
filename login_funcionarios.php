<?php
require 'db.php'; 

session_start(); // Inicie a sessão

// Inicializar variável de mensagem de erro
$error_message = "";

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para obter o nome e o hash da senha do funcionário baseado no e-mail
    $sql_code = "SELECT nome, senha FROM funcionario WHERE email = ?";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($nome, $stored_password);
    $stmt->fetch();

    // Verificar a senha
    if ($stmt->num_rows > 0) {
        // Comparar a senha fornecida com o hash armazenado
        if ($senha == $stored_password) {
            // Senha correta, armazene o nome do usuário na sessão
            $_SESSION['user_name'] = $nome;
            $_SESSION['user_email'] = $email; // Armazene o e-mail do usuário na sessão

            if ($email == 'admin@gmail.com') {
                header('Location: admin_home.php'); // Redirecione para a página específica
            } else {
                header('Location: funcionario_home.php'); // Redirecione para a página padrão
            }
            exit();
        } else {
            // Senha incorreta
            $error_message = "E-mail ou senha incorretos.";
        }
    } else {
        // E-mail não encontrado
        $error_message = "E-mail não encontrado.";
    }

    $stmt->close();
}

// Consulta para obter todos os e-mails dos funcionários
$sql_code = "SELECT email FROM funcionario";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login_funcionario-style.css">
    <style>
        body {
            background: url('img/background-index.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Tornar o fundo do formulário um pouco transparente */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Colaborador Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <select name="email" id="email" class="form-control" required>
                    <option value="">Selecione um e-mail</option>
                    <?php while ($funcionario = $sql_query->fetch_assoc()): ?>
                        <option value="<?php echo htmlspecialchars($funcionario['email']); ?>">
                            <?php echo htmlspecialchars($funcionario['email']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
