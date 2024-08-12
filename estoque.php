<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Sangue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <style>
        .container {
            margin-top: 20px;
        }

        .card {
            background-color: #f7f7f7;
            margin-bottom: 20px;
        }

        .card-header {
            font-size: 20px;
            font-weight: bold;
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .btn-submit {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .button{font-size:16px; }
    </style>
</head>

<body>
    <div class="container">
        <div id="estoque" class="row">
            <!-- Dados serão carregados dinamicamente aqui -->
        </div>

        <div class="text-center mt-4">
            <button onclick="window.location.href='./home.php'" class="btn btn-lg btn-primary btn-adjusted button">
                <i class="fas fa-user-plus"></i> VOLTAR <span class="glyphicon glyphicon-plus"></span>
            </button>
        </div>
    </div>

    <script src="js/estoque.js"></script>
</body>

</html>
