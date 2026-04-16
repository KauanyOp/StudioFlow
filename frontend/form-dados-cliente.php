<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <a href="index.php"><img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo"></a>
</nav>

<main>
    <form action="form-agendamento.php" method="POST">
        <h2>Dados Pessoais</h2>
        <label>Nome Completo:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <label>Data de Nascimento:</label>
        <input type="date" name="data-nasc" id="data-nasc">
        <label>Contato:</label>
        <input type="text" name="contato" id="contato" placeholder="Telefone ou WhatsApp">
        <button type="submit">Próximo</button>
    </form>
</main>

</body>
</html>
