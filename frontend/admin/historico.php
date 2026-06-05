<?php
require_once '../../backend/conexao.php';

$sql = "SELECT
agendamento.id_agendamento, cliente.nome, cliente.contato_cliente, servicos.tipo_servico,
agendamento.data_agen, agendamento.horario, agendamento.status_agendamento

FROM agendamento INNER JOIN cliente ON agendamento.id_cliente = cliente.id_cliente INNER JOIN servicos ON agendamento.id_servicos = servicos.id_servicos
WHERE agendamento.status_agendamento IN ('finalizado','cancelado')";

$params = [];

if(!empty($_GET['servico'])){
    $sql .= " AND servicos.tipo_servico = :servico";
    $params[':servico'] = $_GET['servico'];
}
if(!empty($_GET['cliente'])){
    $sql .= " AND cliente.nome = :cliente";
    $params[':cliente'] = $_GET['cliente'];
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$sqlClientes = "SELECT DISTINCT nome FROM cliente ORDER BY nome";
$stmtClientes = $pdo->prepare($sqlClientes);
$stmtClientes->execute();

$sqlServicos = "SELECT DISTINCT tipo_servico FROM servicos ORDER BY tipo_servico";
$stmtServicos = $pdo->prepare($sqlServicos);
$stmtServicos->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/icon/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <nav class="topbar">
            <a href="../index.php"><img src="../../assets/img/logo/logo-white.png" alt="StudioFlow" class="logo"></a>
            <a href="../login.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </nav>
    </header>
    <aside>
        <nav class="sidebar">
            <div class="nav-links">
                <a href="calendario.php"><i class="fa-regular fa-calendar icon"></i> Calendário</a>
                <a href="agendamentos.php"><i class="fa-regular fa-file-lines icon"></i> Agendamentos</a>
                <a href="historico.php" style="color: var(--red);"><i class="fa-solid fa-clock-rotate-left icon" style="color: var(--red);"></i> Histórico</a>
                <a href="dashboard.php"><i class="fa-solid fa-chart-line icon"></i> Dashboard</a>
                <a href="profissionais.php"><i class="fa-regular fa-user icon"></i> Profissionais</a>
            </div>
        </nav>
    </aside>

    <main>
        <h2>Histórico</h2>
        <p>Atendimentos concluídos</p>
        <form method="GET">
    <div class="box-filter">
        <div class="filter">
            <label>Filtrar por Serviço</label>
            <select name="servico" class=">
            <option value="">Todos os serviços</option>
            <?php while($servico = $stmtServicos->fetch()) { ?>
                <option value="<?php echo $servico['tipo_servico']; ?>"
                    <?php if(isset($_GET['servico']) && $_GET['servico'] == $servico['tipo_servico']) echo 'selected'; ?>>
                    <?php echo ucwords(str_replace('_', ' ', $servico['tipo_servico'])); ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="filter">
            <label>Filtrar por Cliente</label>
            <select name="cliente">
            <option value="">Todos os clientes</option>
            <?php while($cliente = $stmtClientes->fetch()) { ?>
                <option value="<?php echo htmlspecialchars($cliente['nome']); ?>"
                    <?php if(isset($_GET['cliente']) && $_GET['cliente'] == $cliente['nome']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($cliente['nome']); ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="filter">
            <button type="submit" class="btn">Filtrar</button>
        </div>
    </div>
</form>
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Contato</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              <?php while($row = $stmt->fetch()) { ?>
              <tr>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo ucfirst(htmlspecialchars($row['tipo_servico'])); ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['data_agen'])); ?></td>
                <td><?php echo date('H:i', strtotime($row['horario'])); ?></td>
                <td><?php echo htmlspecialchars($row['contato_cliente']); ?></td>
                <td><?php echo ucfirst(htmlspecialchars($row['status_agendamento'])); ?></td>
              </tr>
              <?php } ?>
         </tbody>
        </table>
</main>
</body>
</html>