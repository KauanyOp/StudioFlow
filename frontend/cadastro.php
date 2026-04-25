<?php ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <a href="index.php"><img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo"></a>
</nav>

<main>
    <form action="login.php" method="POST">
        <h2>Cadastro</h2>
        <label>Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>
        <label>Tipo de Conta</label>
        <select id="entidade" name="entidade" required>
          <option value="" disabled selected>Selecione o tipo de conta</option>
          <option value="profissional">Profissional</option>
          <option value="studio">Estúdio</option>
        </select>
        <!-- Campos específicos (Profissional) -->
        <div id="campos-profissional" style="display: none;">
          <label>Especialidade</label>
          <select id="especialidade" name="especialidade">
            <option value="" disabled selected>Selecione a sua especialidade</option>
            <option value="piercing">Piercing</option>
            <option value="fineline">Fine Line</option>
            <option value="old_school">Old School</option>
            <option value="flash_tattoo">Flash Tattoo</option>
            <option value="realista">Realista</option>
            <option value="lettering">Lettering</option>
            <option value="blackout">Blackout</option>
            <option value="anime">Anime</option>
            <option value="cobertura">Cobertura</option>
          </select>
        </div>
        <label>Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        <button type="submit">Enviar</button>
    </form>
</main>

<script>
const selectEntidade = document.getElementById("entidade");
const camposProfissional = document.getElementById("campos-profissional");

selectEntidade.addEventListener("change", () => {
  if (selectEntidade.value === "profissional") {
    camposProfissional.style.display = "block";
  } else {
    camposProfissional.style.display = "none";
  }
});
</script>

</body>
</html>
