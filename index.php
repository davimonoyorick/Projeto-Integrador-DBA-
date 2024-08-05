<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Sangue - Seja um Doador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome -->
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
                    <a class="nav-link" href="#contact">Contato</a>
                </li>
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
                <!-- Link e ícone para o mapa -->
                <a href="https://www.google.com/maps/place/HEMOMAR+-+Centro+de+Hematologia+e+Hemoterapia+do+Maranh%C3%A3o/@-2.5461317,-44.270085,17z/data=!3m1!4b1!4m6!3m5!1s0x7f68f8ccf7f1051:0x3875b46624c473f2!8m2!3d-2.5461371!4d-44.2675101!16s%2Fg%2F1pt_6w1hr?entry=ttu" target="_blank" class="map-link">
                    <i class="fas fa-map-marker-alt"></i> Encontre no Mapa
                </a>
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
        <p>Telefone: (98) 98989-8989</p>
        <a href="https://www.saude.ma.gov.br/doe-sangue/" target="_blank">https://www.saude.ma.gov.br/doe-sangue/</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
