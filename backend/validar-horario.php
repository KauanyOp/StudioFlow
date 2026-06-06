<?php
require_once "conexao.php";

$data = $_GET['data'] ?? '';

$sql = $pdo->prepare("
    SELECT horario
    FROM agendamento
    WHERE data_agen = ?");

$sql->execute([$data]);

$horariosOcupados = $sql->fetchAll(PDO::FETCH_COLUMN);
$horariosOcupados = array_map(function ($h) {
    return substr($h, 0, 5);
}, $horariosOcupados);

header('Content-Type: application/json');
echo json_encode($horariosOcupados);