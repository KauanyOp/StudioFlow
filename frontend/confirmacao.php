<?php
session_start();

$nome_cliente = $_SESSION["nome"] ?? "";
$servico = $_SESSION["servico"] ?? "";
$data_marcada = $_SESSION["data_marcada"] ?? "";
$horario = $_SESSION["horario"] ?? "";
$regiao = $_SESSION["regiao"] ?? "";
$qtd = $_SESSION["qtd"] ?? "";
$estilo = $_SESSION["estilo"] ?? "";
$contato = $_SESSION["contato"] ?? "";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<main class="container-confirm">
    <h2>Agendamento Confirmado</h2>
    <div class="card-confirm">
    <i class="fa-regular fa-circle-check icon"></i>
    <p>Seu agendamento foi realizado com sucesso, <?php echo htmlspecialchars($nome_cliente); ?>!</p>
    <div class="info-confirm">
        <div class="item">
            <i class="fa-regular fa-user"></i>
            <p>Serviço: <?php echo ucfirst(htmlspecialchars($servico)); ?></p>
        </div>
        <div class="item">
            <i class="fa-regular fa-calendar"></i>
            <p>Data: <?php echo date("d/m/Y", strtotime($data_marcada)); ?></p>
        </div>
        <div class="item">
            <i class="fa-regular fa-clock"></i>
            <p>Horário: <?php echo htmlspecialchars($horario); ?></p>
        </div>
    </div>
    </div>
    <a href="index.php">
        <button>Voltar ao Início</button>
    </a>
</main>
</body>
</html>