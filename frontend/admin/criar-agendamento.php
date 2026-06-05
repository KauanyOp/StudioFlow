<?php
session_start();

if (isset($_SESSION["erro"])) {
    $msgs = [
        2 => "Preencha todos os campos!",
        4 => "Estilo obrigatório para tatuagem!",
        5 => "Quantidade inválida!",
        6 => "Horário já está ocupado!",
        7 => "Contato inválido!",
        8 => "Data inválida!"
    ];

    $msg = $msgs[$_SESSION["erro"]] ?? "Erro desconhecido";
    echo "<script>alert('$msg');</script>";
    unset($_SESSION["erro"]);
}
?>
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
    <form action="../../backend/agendar.php" method="POST">
      <input type="hidden" name="origem" value="profissional">
      <div id="tela1" class="tela ativa">
        <h2>Dados do cliente</h2>

        <label>Nome Completo</label>
        <input type="text" name="nome_cliente" id="nome_cliente" placeholder="Digite o nome completo do cliente" required><br>

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
          <option value="" disabled selected>Selecione uma data primeiro</option>
        </select>
        <div>
            <button type="button" onclick="voltarTela2()">Voltar</button>
            <button type="submit">Criar</button>
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
    } else {
        camposTatuagem.style.display = "none";
    }
});

const horariosDisponiveis = [
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "15:30",
    "16:00",
    "16:30",
    "17:00",
    "17:30"
];

document.getElementById("data-marcada").addEventListener("change", function() {
    const data = this.value;

    fetch(`../../backend/validar-horario.php?data=${data}`)
        .then(response => response.json())
        .then(horariosOcupados => {

            const select = document.getElementById("horario");
            select.innerHTML =
                '<option value="" disabled selected>Selecione</option>';
            horariosDisponiveis.forEach(horario => {
                if (!horariosOcupados.includes(horario)) {
                    select.innerHTML +=
                    `<option value="${horario}">${horario}</option>`;
                }
            });
        });
    });
</script>
</body>
</html>
