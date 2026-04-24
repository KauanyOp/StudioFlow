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
    <a href="form-dados-cliente.php"><i class="fa-solid fa-arrow-left icone"></i></a>
    <a href="index.php"><img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo"></a>
</nav>
</nav>

<main>
    <div id="tela1" class="tela ativa">
        <form id="form1">
        <h2>Dados Pessoais</h2>
        <label>Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
        <label>Data de Nascimento:</label>
        <input type="date" name="data-nasc" id="data-nasc" required>
        <label>Contato</label>
        <input type="text" name="contato" id="contato" placeholder="Telefone ou WhatsApp" required>
        <button type="button" onclick="irParaTela2()">Próximo</button>
        </form>
    </div>

    <div id="tela2" class="tela">
        <form action="confirmacao.php" method="POST" enctype="multipart/form-data">
        <h2>Agendamento</h2>
        <label>Selecione o Serviço</label>
        <select id="servico" name="servico" id="servico" required>
          <option value="">Selecione</option>
          <option value="piercing">Piercing</option>
          <option value="tattoo">Tatuagem</option>
          <option value="retoque">Retoque</option>
          <option value="remocao">Remoção</option>
        </select>
        <label>Região do Corpo</label>
        <input type="text" name="regiao" id="regiao" placeholder="Região do corpo que deseja perfurar/tatuar">
        <label>Escolha a Data</label>
        <input type="date" name="data-marcada" id="data-marcada" required>
        <label>Selecione o Horário</label>
        <select id="horario" name="horario" id="horario" required>
          <option value="">Selecione</option>
          <option value="09:00">09:00</option>
          <option value="10:00">10:00</option>
          <option value="11:00">11:00</option>
        </select>
        <div>
            <button type="button" onclick="voltarTela1()">Voltar</button>
            <button type="submit">Enviar</button>
        </div>
        </form>
    </div>
</main>

<script>
function irParaTela2() {
    document.getElementById("tela1").classList.remove("ativa");
    document.getElementById("tela2").classList.add("ativa");
}

function voltarTela1() {
    document.getElementById("tela2").classList.remove("ativa");
    document.getElementById("tela1").classList.add("ativa");
}
</script>

</body>
</html>

