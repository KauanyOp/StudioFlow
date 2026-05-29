<?php
session_start();
require_once "conexao.php";

$origem = $_POST['origem'] ?? 'cliente';
$nome_cliente = trim($_POST["nome_cliente"] ?? "");
$data_nasc = trim($_POST["data-nasc"] ?? "");
$contato = preg_replace('/\D/', '', $_POST["contato"] ?? "");
$servico = trim($_POST["servico"] ?? "");
$regiao = trim($_POST["regiao"] ?? "");
$qtd = trim($_POST["qtd"] ?? "");
$estilo = trim($_POST["estilo"] ?? "");
$data_marcada = trim($_POST["data-marcada"] ?? "");
$horario = trim($_POST["horario"] ?? "");

$paginaRetorno = ($origem == "cliente")
    ? "../frontend/form-agendamento.php"
    : "../frontend/admin/criar-agendamento.php";

    
if (
    $nome_cliente === "" ||
    $data_nasc === "" ||
    $contato === "" ||
    $servico === "" ||
    $regiao === "" ||
    $qtd === "" ||
    $data_marcada === "" ||
    $horario === ""
) {
    $_SESSION["erro"] = 2;
    header("Location: $paginaRetorno");
    exit;
}

if (!preg_match('/^[0-9]{10,11}$/', $contato)) {
    $_SESSION["erro"] = 7;
    header("Location: $paginaRetorno");
    exit;
}

if ($servico === "tatuagem" && $estilo === "") {
    $_SESSION["erro"] = 4;
    header("Location: $paginaRetorno");
    exit;
}

if ($qtd <= 0 || $qtd > 99) {
    $_SESSION["erro"] = 5;
    header("Location: $paginaRetorno");
    exit;
}

if ($data_marcada < date("Y-m-d")) {
    $_SESSION["erro"] = 8;
    header("Location: $paginaRetorno");
    exit;
}

$estilo = ($estilo === "") ? null : $estilo;

$sqlCheck = $pdo->prepare("
    SELECT id_agendamento
    FROM agendamento
    WHERE data_agen = ?
    AND horario = ?
");

$sqlCheck->execute([
    $data_marcada,
    $horario
]);

if ($sqlCheck->fetch()) {
    $_SESSION["erro"] = 6;
    header("Location: $paginaRetorno");
    exit;
}

try {

    $pdo->beginTransaction();

    $sqlCliente = $pdo->prepare("
        INSERT INTO cliente
        (nome, data_nasc, contato_cliente)
        VALUES (?, ?, ?)
    ");

    $sqlCliente->execute([
        $nome_cliente,
        $data_nasc,
        $contato
    ]);

    $id_cliente = $pdo->lastInsertId();

    $sqlServico = $pdo->prepare("
        INSERT INTO servicos
        (tipo_servico, regiao, quantidade, estilo)
        VALUES (?, ?, ?, ?)
    ");

    $sqlServico->execute([
        $servico,
        $regiao,
        $qtd,
        $estilo
    ]);

    $id_servico = $pdo->lastInsertId();

    $id_profissional = 1;

    $sqlAgendamento = $pdo->prepare("
        INSERT INTO agendamento
        (data_agen, horario, id_cliente, id_servicos, id_profissional)
        VALUES (?, ?, ?, ?, ?)
    ");

    $sqlAgendamento->execute([
        $data_marcada,
        $horario,
        $id_cliente,
        $id_servico,
        $id_profissional
    ]);

    $pdo->commit();

    $_SESSION["nome_cliente"] = $nome_cliente;
    $_SESSION["servico"] = $servico;
    $_SESSION["data_marcada"] = $data_marcada;
    $_SESSION["horario"] = $horario;
    $_SESSION["regiao"] = $regiao;
    $_SESSION["qtd"] = $qtd;
    $_SESSION["estilo"] = $estilo;
    $_SESSION["contato"] = $contato;
    $_SESSION["sucesso"] = 1;

    if ($origem == "cliente") {
        header("Location: ../frontend/confirmacao.php");
    } else {
        header("Location: ../frontend/admin/calendario.php");
    }

    exit;

} catch (Exception $e) {

    $pdo->rollBack();
    die($e->getMessage());

}

?>