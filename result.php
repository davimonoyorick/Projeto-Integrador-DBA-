<?php require "auth.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Doadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <style type="text/css">
        body{
            background-image: url("css/banco_de_sangue.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
        }
        .container {
            background: rgba(0, 0, 0, 0.7); /* Transparência de 70% */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000;
        }
        .card {
            background: rgba(255, 255, 255, 0.8); /* Transparência de 80% */
            margin-bottom: 15px;
            border: none;
        }
        .card-title, .card-text {
            color: #000;
        }
        .button-container{
             display: flex;
            justify-content: center;
            gap:10px;
        }
        .btn-adjusted {
            font-size: 16px;
        }
        .link-call{
            display: inline;
        }
        .sair{
            font-size:16px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Dados dos Doadores</h1>
        <!-- Campo de pesquisa -->
        <div class="form-group">
            <input type="text" class="form-control" id="searchInput" placeholder="Pesquisar por CPF, nome ou RG">
        </div>
        <!-- Seleção de Tipo de Sangue -->
        <div class="form-group">
            <select class="form-control" id="bloodTypeSelect">
                <option value="">Selecione o Tipo de Sangue</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div id="dados" class="row"></div>
<div class="text-center mt-4">
    <div class="button-container">
        <button onclick="window.location.href='./home.php'" class="btn btn-lg btn-primary btn-adjusted">
            <i class="fas fa-user-plus"></i> VOLTAR <span class="glyphicon glyphicon-plus"></span>
        </button>
        <a href="index.php" class="btn btn-info btn-adjusted sair"><span class="glyphicon glyphicon-log-out"></span> Sair</a>
    </div>
</div>

    </div>

    <script src="js/result.js"></script>
</body>
</html>
