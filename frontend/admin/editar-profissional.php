<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Profissional</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<main>
    <form action="profissionais.php" method="POST">
        <h2>Editar Profissional</h2>
        <label>Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <label>Contato</label>
        <input type="text" name="contato" id="contato" placeholder="Telefone ou WhatsApp">
        <label>Selecione a Especialidade</label>
        <select id="servico" name="servico" required>
          <option value="" disabled selected>Selecione</option>
          <option value="tattoo">Tatto Personalizada</option>
          <option value="flash">Flash Tattoo</option>
          <option value="cobertura">Cobertura</option>
          <option value="remocao">Remoção</option>
        </select>
        <button type="submit">Editar</button>
    </form>
</main>

</body>
</html>
