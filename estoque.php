<?php 
require 'db.php';
$sql = "SELECT * FROM estoque";
$result = $mysqli->query($sql);

// Cria a estrutura da página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Sangue</title>
    <!-- Adiciona o Bootstrap para estilizar a página -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adiciona o Font Awesome para ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f8;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
        }
        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            padding: 10px 20px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            border-radius: 4px;
            padding: 10px 20px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #5a6268;
            text-decoration: none;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        .table tbody tr {
            transition: background-color 0.3s;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table td {
            text-align: center;
        }
        .btn-icon i {
            margin-right: 8px;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        .d-flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-critical-stock {
            background-color: #dc3545 !important; /* Vermelho para indicar estoque crítico */
            color: #ffffff;
        }
        @media (max-width: 576px) {
            .btn-custom, .btn-back {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Estoque de Sangue</h1>
        <div class="d-flex-between mb-3">
            <a href="javascript:history.back()" class="btn btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <a href="exportar.php" class="btn btn-custom btn-icon"><i class="fas fa-download"></i> Exportar Dados</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo Sanguíneo</th>
                    <th>Quantidade de Bolsas</th>
                    <th>Localização</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'db.php';
                $sql = "SELECT * FROM estoque";
                $result = $mysqli->query($sql);

                // Verifica se há resultados
                if ($result->num_rows > 0) {
                    // Exibe os dados em linhas de tabela
                    while ($row = $result->fetch_assoc()) {
                        // Define a classe de alerta com base na quantidade de bolsas
                        if ($row['quantidade_bolsa'] == 0) {
                            $alertClass = 'alert-critical-stock'; // Estoque crítico
                        } elseif ($row['quantidade_bolsa'] < 6) {
                            $alertClass = 'alert-low-stock'; // Estoque baixo
                        } else {
                            $alertClass = '';
                        }
                        echo "<tr class='$alertClass'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tipo_sanguineo'] . "</td>";
                        echo "<td>" . $row['quantidade_bolsa'] . "</td>";
                        echo "<td>" . $row['localizacao'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum dado encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts do Bootstrap e Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
