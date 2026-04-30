<?php

$host = "localhost";
$db = "studioflow";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Erro na conexão: " . $e->getMessage());

}

?>