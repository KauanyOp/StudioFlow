<?php
require_once '../../backend/conexao.php';

$id = $_GET['id'];

$sql = "SELECT
agendamento.id_agendamento,
agendamento.data_agen,
agendamento.horario,
cliente.id_cliente,
cliente.nome,
cliente.contato_cliente,
servicos.id_servicos,
servicos.tipo_servico
FROM agendamento
INNER JOIN cliente ON agendamento.id_cliente = cliente.id_cliente
INNER JOIN servicos ON agendamento.id_servicos = servicos.id_servicos
WHERE agendamento.id_agendamento = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$agendamento = $stmt->fetch();

if(!$agendamento){
    die("Agendamento não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Agendamento</title>
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="../../assets/img/logo/favicon.ico" type="image/x-icon">
</head>
<body>
<main>
<form action="../../backend/atualizar-status.php" method="POST">
<input type="hidden" name="id_agendamento" value="<?php echo $agendamento['id_agendamento']; ?>">
<input type="hidden" name="id_cliente" value="<?php echo $agendamento['id_cliente']; ?>">
<input type="hidden" name="id_servicos" value="<?php echo $agendamento['id_servicos']; ?>">

<h2>Editar Agendamento</h2>
<label>Cliente</label>
<input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($agendamento['nome']); ?>" required>
<label>Contato</label>
<input type="text" name="contato" id="contato" value="<?php echo htmlspecialchars($agendamento['contato_cliente']); ?>" required>
<label>Selecione a Data</label>
<input type="date" name="data" id="data-marcada" value="<?php echo $agendamento['data_agen']; ?>" required>
<label>Selecione o Horário</label>

<select id="horario" name="horario" required>
<option value="09:00" <?php if($agendamento['horario']=='09:00') echo 'selected'; ?>>09:00</option>
<option value="10:00" <?php if($agendamento['horario']=='10:00') echo 'selected'; ?>>10:00</option>
<option value="11:00" <?php if($agendamento['horario']=='11:00') echo 'selected'; ?>>11:00</option>
</select>

<label>Selecione o Serviço</label>
<select id="servico" name="servico" required>
    <option value="piercing" <?php echo ($agendamento['tipo_servico'] == 'piercing') ? 'selected' : ''; ?>>Piercing</option>
    <option value="tatuagem" <?php echo ($agendamento['tipo_servico'] != 'piercing') ? 'selected' : ''; ?>>Tatuagem</option>
</select>

<button type="submit">Editar</button>
</form>
</main>
</body>
</html>
