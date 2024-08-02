<?php require "auth.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Doadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .btn-adjusted {
            margin-top: -20px;
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
            <button onclick="window.location.href='./home.php'" class="btn btn-lg btn-primary btn-adjusted">CADASTRO <span class="glyphicon glyphicon-list"></span></button>
        </div>
    </div>

    <script src="js/result.js"></script>
</body>
</html>
