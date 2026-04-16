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
    <form action="confirmacao.php" method="POST">
        <h2>Agendamento</h2>
        <label>Selecione o Serviço</label>
        <select id="servico" name="servico" required>
          <option value="">Selecione</option>
          <option value="tattoo">Tatto Personalizada</option>
          <option value="flash">Flash Tattoo</option>
          <option value="cobertura">Cobertura</option>
          <option value="remocao">Remoção</option>
        </select>
        <label>Escolha a Data</label>
        <input type="date" name="data-marcada" id="data-marcada">
        <label>Selecione o Horário</label>
        <select id="horario" name="horario" required>
          <option value="">Selecione</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</main>

</body>
</html>
