<?php require "auth.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Doadores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/result-style.css">

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
        <button onclick="window.location.href='./admin_home.php'" class="btn btn-lg btn-primary btn-adjusted">
            <i class="fas fa-user-plus"></i>Voltar<span class="glyphicon glyphicon-plus"></span>
        </button>
        <a href="index.php" class="btn btn-info btn-adjusted">Sair</a>
    </div>
</div>

    </div>

    <script src="js/result.js"></script>
</body>
</html>
