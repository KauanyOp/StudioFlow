<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/icon/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav>
    <a href="index.php"><i class="fa-solid fa-arrow-left icone"></i></a>
    <a href="index.php">
        <img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo">
    </a>
</nav>

<main>

<form action="../backend/agendar.php" method="POST">

    <div id="tela1" class="tela ativa">
        <h2>Dados Pessoais</h2>

        <label>Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data-nasc" id="data-nasc" required><br>

        <label>Contato</label>
        <input type="text" name="contato" id="contato" placeholder="Telefone ou WhatsApp" required><br>

        <button type="button" onclick="irParaTela2()">Próximo</button>
    </div>

    <div id="tela2" class="tela">
        <h2>Serviço</h2>

        <label>Selecione o Serviço</label>
        <select id="servico" name="servico" required>
            <option value="" disabled selected>Selecione</option>
            <option value="piercing">Piercing</option>
            <option value="tatuagem">Tatuagem</option>
        </select><br>

        <label>Região do Corpo</label>
        <input type="text" name="regiao" id="regiao" placeholder="Região do corpo que deseja perfurar/tatuar"><br>

        <label>Quantidade</label>
        <input type="number" name="qtd" id="qtd" max="99" placeholder="Insira a quantidade de tatuagens/perfurações deseja"><br>

        <!-- Campos específicos (Tatuagem) -->
        <div id="campos-tatuagem" style="display: none;">
            <label>Estilo de Tatuagem</label>

            <select id="estilo" name="estilo"><br>
                <option value="" disabled selected>Selecione o estilo</option>
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

        <div>
            <button type="button" onclick="voltarTela1()">Voltar</button>
            <button type="button" onclick="irParaTela3()">Próximo</button>
        </div>
    </div>

    <div id="tela3" class="tela">
        <h2>Agendamento</h2>

        <label>Escolha a Data</label>
        <input type="date" name="data-marcada" id="data-marcada" required>

        <label>Selecione o Horário</label>
        <select id="horario" name="horario" required>
            <option value="" disabled selected>Selecione</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
        </select>

        <div>
            <button type="button" onclick="voltarTela2()">Voltar</button>
            <button type="submit">Enviar</button>
        </div>
    </div>

</form>

</main>

<script>

function irParaTela2() {
    document.getElementById("tela1").classList.remove("ativa");
    document.getElementById("tela2").classList.add("ativa");
    document.getElementById("tela3").classList.remove("ativa");
}

function irParaTela3() {
    document.getElementById("tela1").classList.remove("ativa");
    document.getElementById("tela2").classList.remove("ativa");
    document.getElementById("tela3").classList.add("ativa");
}

function voltarTela1() {
    document.getElementById("tela3").classList.remove("ativa");
    document.getElementById("tela2").classList.remove("ativa");
    document.getElementById("tela1").classList.add("ativa");
}

function voltarTela2() {
    document.getElementById("tela3").classList.remove("ativa");
    document.getElementById("tela2").classList.add("ativa");
    document.getElementById("tela1").classList.remove("ativa");
}

const selectServico = document.getElementById("servico");
const camposTatuagem = document.getElementById("campos-tatuagem");

selectServico.addEventListener("change", () => {

    if (selectServico.value === "tatuagem") {
        camposTatuagem.style.display = "block";
    } 
    
    else {
        camposTatuagem.style.display = "none";
    }

});

</script>

</body>
</html>
