<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Sangue - Seja um Doador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .hero-section {
            height: 100vh;
            background: url('https://example.com/sua-imagem.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero-section h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-top: 20px;
        }
        .hero-btn {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 1.2rem;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .steps-section {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }
        .steps-section h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }
        .step {
            margin-bottom: 40px;
        }
        .step-icon {
            font-size: 3rem;
            color: #007bff;
        }
        .contact-section {
            padding: 60px 0;
            background-color: #f1f1f1;
            text-align: center;
        }
        .contact-section h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Banco de Sangue</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Acessar</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Seja um Doador de Sangue</h1>
            <p>Ajude a salvar vidas. Doe sangue e faça a diferença.</p>
            <a href="#steps" class="hero-btn">Saiba Mais</a>
        </div>
    </div>

    <!-- Steps Section -->
    <div class="container steps-section" id="steps">
        <h2>Como Funciona o Cadastro</h2>
        <div class="row">
            <div class="col-md-4 step">
                <div class="step-icon mb-3">
                    <i class="fas fa-hospital"></i>
                </div>
                <h4>Visite o Local de Doação</h4>
                <p>Vá ao banco de sangue mais próximo para iniciar o processo de doação.</p>
            </div>
            <div class="col-md-4 step">
                <div class="step-icon mb-3">
                    <i class="fas fa-notes-medical"></i>
                </div>
                <h4>Avaliação Médica</h4>
                <p>Passará por uma avaliação médica para verificar se está apto para doar.</p>
            </div>
            <div class="col-md-4 step">
                <div class="step-icon mb-3">
                    <i class="fas fa-user-check"></i>
                </div>
                <h4>Receba seu Login</h4>
                <p>Se estiver apto, você receberá um login para acessar seu histórico de doação.</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container contact-section" id="contact">
        <h2>Contato</h2>
        <p>Para mais informações, entre em contato conosco:</p>
        <p>Email: contato@bancodesangue.com</p>
        <p>Telefone: (11) 1234-5678</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
