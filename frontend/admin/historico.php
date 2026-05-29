<?php
require_once '../../backend/conexao.php';

$sql = "SELECT
agendamento.id_agendamento,
cliente.nome,
cliente.contato_cliente,
servicos.tipo_servico,
agendamento.data_agen,
agendamento.horario,
agendamento.status_agendamento

FROM agendamento INNER JOIN cliente ON agendamento.id_cliente = cliente.id_cliente INNER JOIN servicos ON agendamento.id_servicos = servicos.id_servicos";

$stmt = $pdo->prepare($sql);
$stmt->execute();
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
        <div class="box-filter">
         <div class="filter">
            <label for="filter">Filtrar por Serviço</label>
            <select id="filter-servico" name="filter-servico">
                <option value="" disabled selected>Selecione um serviço</option>
                <option value="tatuagem">Tatuagem</option>
                <option value="remoção">Remoção</option>
                <option value="flash-tattoo">Flash Tattoo</option>
                <option value="cobertura">Cobertura</option>
            </select>
         </div>
        <div class="filter">
            <label for="filter">Filtrar por Cliente</label>
            <select id="filter-cliente" name="filter-cliente">
                <option value="" disabled selected>Selecione um cliente</option>
                <option value="kauany-oliveira">Kauany Oliveira</option>
                <option value="giovanna-rodrigues">Giovanna Rodrigues</option>
                <option value="paulo-henrique">Paulo Henrique</option>
                <option value="davi-xavier">Davi Xavier</option>
            </select>
        </div>
        </div>
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
                <td><?php echo htmlspecialchars($row['tipo_servico']); ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['data_agen'])); ?></td>
                <td><?php echo date('H:i', strtotime($row['horario'])); ?></td>
                <td><?php echo htmlspecialchars($row['contato_cliente']); ?></td>
                <td><?php echo htmlspecialchars($row['status_agendamento']); ?></td>
              </tr>
              <?php } ?>
         </tbody>
        </table>
</main>
</body>
</html>