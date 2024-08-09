<?php
session_start();
require "auth.php"; // Inclua o arquivo de autenticação
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante'; // Defina a variável $nome
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BANCO DE SANGUE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function(){
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
                    $("#consentimento").closest(".checkbox").css("border", "2px solid red");
                } else {
                    $("#consentimento-erro").hide();
                    $("#consentimento").closest(".checkbox").css("border", "none");
                }
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="./img/favicon.png" style="width: 50px;" alt="icone de sangue">
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Cadastro</a></li>
                <li><a href="#">Estoque</a></li>
                <li><a href="#">Solicitação</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo htmlspecialchars($nome); ?></a></li>
                <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>Sair</a></li>
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
                        <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-log-out"></span>Sair</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="js/app.js"></script>
</body>
</html>
