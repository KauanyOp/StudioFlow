<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Agendamento</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/icon/favicon.ico" type="image/x-icon">
</head>
<body>

<main>
    <form action="calendario.php" method="POST">
        <h2>Criar Agendamento</h2>
        <label>Cliente</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome do cliente">
        <label>Contato</label>
        <input type="text" name="contato" id="contato" placeholder="Telefone ou WhatsApp">
        <label>Selecione a Data</label>
        <input type="date" name="data-marcada" id="data-marcada">
        <label>Selecione o Horário</label>
        <select id="horario" name="horario" required>
          <option value="" disabled selected>Selecione</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
        </select>
        <label>Selecione o Serviço</label>
        <select id="servico" name="servico" required>
          <option value="" disabled selected>Selecione</option>
          <option value="tattoo">Tatto Personalizada</option>
          <option value="flash">Flash Tattoo</option>
          <option value="cobertura">Cobertura</option>
          <option value="remocao">Remoção</option>
        </select>
        <button type="submit">Criar</button>
    </form>
</main>

</body>
</html>
