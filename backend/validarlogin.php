<?php
session_start();
require_once "conexao.php";

$email = trim($_POST["email"]);
$senha = trim($_POST["senha"]);

if ($email === "" || $senha === "") {
    $_SESSION["logado"] = false;
    $_SESSION["erro"] = 2;
    header("Location: ../frontend/login.php");
    exit;
}

$sql = $pdo->prepare("SELECT * FROM profissional WHERE email = ?");
$sql->execute([$email]);

$user = $sql->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($senha, $user["senha"])) {

    $_SESSION["logado"] = true;
    $_SESSION["id_profissional"] = $user["id_profissional"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["email"] = $user["email"];

    header("Location: ../frontend/admin/calendario.php");
    exit;

} else {
    $_SESSION["logado"] = false;
    $_SESSION["erro"] = 1;
    header("Location: ../frontend/login.php");
    exit;
}
?>