<?php
session_start();
require_once "conexao.php";

$nome = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$contato_prof = trim($_POST["contato_prof"]);
$entidade = trim($_POST["entidade"]);
$especialidade = trim($_POST["especialidade"] ?? "");
$senha = trim($_POST["senha"]);

if (
    $nome === "" ||
    $email === "" ||
    $contato_prof === "" ||
    $entidade === "" ||
    $senha === ""
) {
    $_SESSION["erro"] = 2;
    header("Location: ../frontend/cadastro.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["erro"] = 3;
    header("Location: ../frontend/cadastro.php");
    exit;
}

if ($entidade === "profissional" && $especialidade === "") {
    $_SESSION["erro"] = 4;
    header("Location: ../frontend/cadastro.php");
    exit;
}

$sql = $pdo->prepare("SELECT id_profissional FROM profissional WHERE email = ?");
$sql->execute([$email]);

if ($sql->rowCount() > 0) {
    $_SESSION["erro"] = 5;
    header("Location: ../frontend/cadastro.php");
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$insert = $pdo->prepare("
    INSERT INTO profissional
    (nome, contato_prof, email, senha, especialidade, status_profissional)
    VALUES (?, ?, ?, ?, ?, 'ativo')
");

$insert->execute([
    $nome,
    $contato_prof,
    $email,
    $senhaHash,
    $especialidade
]);

$_SESSION["sucesso"] = 1;

header("Location: ../frontend/login.php");
exit;
?>