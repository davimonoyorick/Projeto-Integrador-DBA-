<?php
session_start(); // Inicie a sessão

// Verifique se o usuário está logado
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php'); // Redirecionar para a página de login se não estiver logado
    exit();
}

$nome = $_SESSION['user_name']; // Obtenha o nome do usuário
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: black; /* Fundo do corpo da página */
        }
        .navbar {
            z-index: 1000; /* Garantir que a navbar está acima da barra lateral */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            background-color: #007bff; /* Cor de fundo da navbar */
            color: #fff; /* Cor do texto da navbar */
        }
        .navbar-brand {
            color: #fff !important; /* Garantir que o texto da navbar seja branco */
        }
        .sidebar {
            background-color: #343a40;
            color: #fff;
            width: 250px;
            padding-top: 60px; /* Adicionar espaçamento para não ser coberto pelo cabeçalho */
            height: 100vh;
            position: fixed;
            top: 56px; /* Ajuste baseado na altura da navbar */
            left: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            overflow-y: auto;
            z-index: 500; /* Garantir que a barra lateral está abaixo da navbar mas acima do conteúdo */
        }
        .sidebar a {
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #495057;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            margin-top: 56px; /* Adicionar margem para o conteúdo não ficar atrás da navbar */
        }
        .container {
            background: #fff; /* Fundo branco */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
            max-width: 800px; /* Defina uma largura máxima, ajuste conforme necessário */
            margin: 20px auto; /* Margem automática para centralizar horizontalmente */
            text-align: center; /* Opcional: centralizar o texto dentro do container */
        }
        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.25rem;
            border-bottom: 1px solid #0069d9;
        }
        .card-body {
            padding: 20px;
            color: #000; /* Cor do texto no conteúdo principal */
        }
        .btn-custom {
            border-radius: 0.25rem;
            margin: 10px 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .btn-custom:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Painel de Administração</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($nome); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Barra Lateral -->
    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="#" onclick="showContent('relatorios')">Relatórios</a>
        <a href="#" onclick="showContent('funcionarios')">Funcionários</a>
        <a href="#" onclick="showContent('estoque')">Estoque</a>
        <a href="#" onclick="showContent('cadastro')">Cadastro Novo Funcionario</a>
        <a href="#" onclick="showContent('solicitacoes')">Solicitações</a>
        <a href="#" onclick="showContent('configuracoes')">Configurações</a>
        <a href="logout.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="content" id="main-content">
        <div class="container">
            <h1 class="text-center">Bem-vindo ao Painel de Administração!</h1>
            <p class="text-center">Selecione uma opção no menu lateral para visualizar o conteúdo.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showContent(section) {
            var content = {
                'relatorios': 'Relatorios.',
                'funcionarios': 'Aqui estão os funcionários.',
                'estoque': 'Aqui está o estoque.',
                'cadastro': 'Aqui você pode cadastrar um novo funcionário.',
                'solicitacoes': 'Aqui estão as solicitações.',
                'configuracoes': 'Aqui você pode ajustar as configurações.'
            };

            document.getElementById('main-content').innerHTML = '<div class="container"><h1 class="text-center">' + content[section] + '</h1></div>';
        }
    </script>
</body>
</html>
