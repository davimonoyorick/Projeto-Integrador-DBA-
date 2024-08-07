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
    <title>Bem-vindo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="css/admin_home-style.css">
    <script>
        $(document).ready(function() {
            // Máscara para os campos
            $('#phone').mask('(00) 00000-0000');
            $('#phone_secundario').mask('(00) 00000-0000');
            $('#cpf').mask('000.000.000-00');
            $('#rg').mask('00.000.000-0');
            $('#peso').mask('000.00');
            $('#altura').mask('0.00');

            // Validação do consentimento
            $("#contact_form").on("submit", function(e) {
                if (!$("#consentimento").is(":checked")) {
                    e.preventDefault();
                    $("#consentimento-erro").show();
                    $("#consentimento").closest(".form-check").css("border", "2px solid red");
                } else {
                    $("#consentimento-erro").hide();
                    $("#consentimento").closest(".form-check").css("border", "none");
                }
            });
        });
    </script>
    <style>
        body {
            background-image: url('img/banco_de_sangue.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            background: rgba(0, 0, 0, 0.8); /* Transparência de 80% */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            margin-top: 80px; /* Margem para não sobrepor o conteúdo */
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            margin-bottom: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .form-check-label {
            margin-left: 0.5rem;
        }
        .form-check-input {
            margin-left: 0.3rem;
        }
        .form-check-input[type="file"] {
            padding: 0.5rem;
        }
        .alert {
            border-radius: 0.25rem;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .btn {
            border-radius: 0.25rem;
        }
        .btn-warning {
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .btn-warning:hover {
            background-color: #ec971f;
            border-color: #d58512;
        }
        .btn-info {
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .btn-info:hover {
            background-color: #31b0d5;
            border-color: #269abc;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand" href="#">Colaborador: <?php echo htmlspecialchars($nome); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell notification-icon"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="estoque.php">Estoque</a>
                        <a class="dropdown-item" href="solicitacoes.php">Solicitação</a>
                        <a class="dropdown-item" href="#">Cadastro</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <form class="well form-horizontal" action="submit.php" method="post" id="contact_form">
            <fieldset>
                <legend class="text-center">SANGUE SOLIDÁRIO!</legend>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Nome -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="first_name" placeholder="Primeiro nome" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Sobrenome -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sobrenome</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="last_name" placeholder="Sobrenome" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Data de nascimento -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Data de Nascimento</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input name="data_nascimento" class="form-control" type="date" required>
                                </div>
                            </div>
                        </div>
                        <!-- Sexo -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Sexo</label>
                            <div class="col-md-8 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="sexo" class="form-control" required>
                                        <option value="">Selecione seu sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Histórico Médico -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Histórico Médico</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
                                    <textarea name="historico_medico" placeholder="Descreva o histórico do doador" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Telefone -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input id="phone" name="phone" placeholder="(55) xxxxx-xxxx" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- Telefone Secundário -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Segundo Telefone</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input id="phone_secundario" name="phone_secundario" placeholder="(55) xxxxx-xxxx" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email" placeholder="Endereço de E-Mail" class="form-control" type="email" required>
                                </div>
                            </div>
                        </div>
                        <!-- Tipo de Sangue -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tipo de Sangue</label>
                            <div class="col-md-8 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
                                    <select name="tipo_sangue" class="form-control" required>
                                        <option value="">Selecione seu tipo de sangue</option>
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
                            </div>
                        </div>
                        <!-- RG -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">RG</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input id="rg" name="rg" placeholder="RG" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- CPF -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">CPF</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input id="cpf" name="cpf" placeholder="CPF" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- Peso -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Peso</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
                                    <input id="peso" name="peso" placeholder="Peso em kg" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>
                        <!-- Altura -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Altura</label>
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-resize-vertical"></i></span>
                                    <input id="altura" name="altura" placeholder="Altura em cm" class="form-control" type="text" required>
                                </div>
                            </div>
                        </div>

                        <!-- Consentimento Informado -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <div class="checkbox">
                                    <label>
                                        <input id="consentimento" type="checkbox" name="consentimento"> Eu confirmo que li e entendo os termos de doação de sangue.
                                    </label>
                                </div>
                                <div id="consentimento-erro" style="color:red; display: none;">Você deve confirmar os termos antes de continuar.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success" role="alert" id="success_message" style="display: none;">Sucesso <i class="glyphicon glyphicon-thumbs-up"></i> Obrigado por se inscrever, entraremos em contato com você em breve.</div>
                <!-- Button -->
                <div class="form-group text-center">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">Enviar <span class="glyphicon glyphicon-send"></span></button>
                        <!-- Botão para ver resultado -->
                        <a href="result.php" class="btn btn-info">Ver resultado <span class="glyphicon glyphicon-list"></span></a>
                        <a href="index.php" class="btn btn-info">Sair</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
