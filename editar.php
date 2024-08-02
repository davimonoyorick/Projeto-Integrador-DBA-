<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Processar a atualização dos dados
    $id = intval($_POST['id']);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $tipo_sangue = $_POST['tipo_sangue'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    // Atualizar a tabela pessoal
    $sql_pessoal = "UPDATE pessoal SET first_name = ?, last_name = ?, data_nascimento = ?, sexo = ?, tipo_sangue = ? WHERE id = ?";
    if ($stmt_pessoal = $mysqli->prepare($sql_pessoal)) {
        $stmt_pessoal->bind_param('sssssi', $first_name, $last_name, $data_nascimento, $sexo, $tipo_sangue, $id);
        $stmt_pessoal->execute();
        $stmt_pessoal->close();
    } else {
        die('Erro ao preparar a consulta para a tabela pessoal: ' . $mysqli->error);
    }

    // Atualizar a tabela contato_pessoal
    $sql_contato = "UPDATE contato_pessoal SET phone = ?, email = ? WHERE doador_id = ?";
    if ($stmt_contato = $mysqli->prepare($sql_contato)) {
        $stmt_contato->bind_param('ssi', $phone, $email, $id);
        $stmt_contato->execute();
        $stmt_contato->close();
    } else {
        die('Erro ao preparar a consulta para a tabela contato_pessoal: ' . $mysqli->error);
    }

    // Atualizar a tabela identidade
    $sql_identidade = "UPDATE identidade SET rg = ?, cpf = ? WHERE doador_id = ?";
    if ($stmt_identidade = $mysqli->prepare($sql_identidade)) {
        $stmt_identidade->bind_param('ssi', $rg, $cpf, $id);
        $stmt_identidade->execute();
        $stmt_identidade->close();
    } else {
        die('Erro ao preparar a consulta para a tabela identidade: ' . $mysqli->error);
    }

    // Redirecionar de volta para a página de edição com uma mensagem de sucesso
    header('Location: editar.php?id=' . $id . '&message=success');
    exit();
} else if (isset($_GET['id'])) {
    // Exibir o formulário de edição
    $id = intval($_GET['id']);
    $sql = "SELECT p.id, p.first_name, p.last_name, p.data_nascimento, p.sexo, c.phone, c.email, p.tipo_sangue, i.rg, i.cpf 
            FROM pessoal p 
            JOIN contato_pessoal c ON p.id = c.doador_id 
            JOIN identidade i ON p.id = i.doador_id
            WHERE p.id = ?";
    
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $doador = $result->fetch_assoc();
        $stmt->close();
    } else {
        die('Erro ao preparar a consulta: ' . $mysqli->error);
    }
} else {
    die('ID do doador não especificado.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Doador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Editar Doador</h1>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'success'): ?>
            <div class="alert alert-success" role="alert">
                Dados do doador atualizados com sucesso!
            </div>
        <?php endif; ?>

        <form action="editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($doador['id']); ?>">

            <div class="form-group">
                <label for="first_name">Primeiro Nome</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($doador['first_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Sobrenome</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($doador['last_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($doador['data_nascimento']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="M" <?php echo $doador['sexo'] == 'M' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="F" <?php echo $doador['sexo'] == 'F' ? 'selected' : ''; ?>>Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_sangue">Tipo Sanguíneo</label>
                <select class="form-control" id="tipo_sangue" name="tipo_sangue" required>
                    <option value="A+" <?php echo $doador['tipo_sangue'] == 'A+' ? 'selected' : ''; ?>>A+</option>
                    <option value="A-" <?php echo $doador['tipo_sangue'] == 'A-' ? 'selected' : ''; ?>>A-</option>
                    <option value="B+" <?php echo $doador['tipo_sangue'] == 'B+' ? 'selected' : ''; ?>>B+</option>
                    <option value="B-" <?php echo $doador['tipo_sangue'] == 'B-' ? 'selected' : ''; ?>>B-</option>
                    <option value="AB+" <?php echo $doador['tipo_sangue'] == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                    <option value="AB-" <?php echo $doador['tipo_sangue'] == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                    <option value="O+" <?php echo $doador['tipo_sangue'] == 'O+' ? 'selected' : ''; ?>>O+</option>
                    <option value="O-" <?php echo $doador['tipo_sangue'] == 'O-' ? 'selected' : ''; ?>>O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($doador['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($doador['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo htmlspecialchars($doador['rg']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo htmlspecialchars($doador['cpf']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='result.html';">Voltar</button>

        </form>
    </div>
</body>
</html>
