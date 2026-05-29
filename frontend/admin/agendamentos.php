<?php require_once '../../backend/conexao.php';

//Seleciona os campos no banco
$sql = "SELECT 
  agendamento.id_agendamento,
  cliente.nome,
  cliente.contato_cliente,
  servicos.tipo_servico,
  agendamento.data_agen,
  agendamento.horario,
  agendamento.status_agendamento

  FROM agendamento INNER JOIN cliente ON agendamento.id_cliente = cliente.id_cliente 
  INNER JOIN servicos ON agendamento.id_servicos = servicos.id_servicos WHERE agendamento.status_agendamento IN ('pendente','confirmado')";

//$stmt = statement(instrução do sql)
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
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
                <a href="agendamentos.php" style="color: var(--red);"><i class="fa-regular fa-file-lines icon" style="color: var(--red);"></i> Agendamentos</a>
                <a href="historico.php"><i class="fa-solid fa-clock-rotate-left icon" ></i> Histórico</a>
                <a href="dashboard.php"><i class="fa-solid fa-chart-line icon"></i> Dashboard</a>
                <a href="profissionais.php"><i class="fa-regular fa-user icon"></i> Profissionais</a>
            </div>
        </nav>
    </aside>

    <main>
        <h2>Agendamentos</h2>
        <p>Atendimentos com realização pendente</p>
        <table><br>
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Serviço</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Contato</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <!--pega os dados selecionados-->
          <?php while($row = $stmt->fetch()) { ?>
            <tr>
              <td><?php echo htmlspecialchars($row['nome']); ?></td>
              <td><?php echo htmlspecialchars($row['tipo_servico']); ?></td>
              <td><?php echo date('d/m/Y', strtotime($row['data_agen'])); ?></td>
              <td><?php echo date('H:i', strtotime($row['horario'])); ?></td>
              <td><?php echo htmlspecialchars($row['contato_cliente']); ?></td>
              <td>
              <select name="status" class="status <?php echo $row['status_agendamento']; ?>" data-id="<?php echo $row['id_agendamento']; ?>">
              <option value="pendente" <?php if($row['status_agendamento'] == 'pendente') echo 'selected'; ?> class="pendente">Pendente</option>
              <option value="confirmado" <?php if($row['status_agendamento'] == 'confirmado') echo 'selected'; ?> class="confirmado">Confirmado</option>
              <option value="finalizado" <?php if($row['status_agendamento'] == 'finalizado') echo 'selected'; ?> class="finalizado">Finalizado</option>
              <option value="cancelado" <?php if($row['status_agendamento'] == 'cancelado') echo 'selected'; ?> class="cancelado">Cancelado</option>
            </select>
            </td>
            <td>
            <a href="editar-agendamento.php?id=<?php echo $row['id_agendamento']; ?>"><i class="fa-regular fa-pen-to-square icon"></i></a>
            <a href="../../backend/atualizar-status.php?excluir=<?php echo $row['id_agendamento']; ?>" onclick="return confirm('Deseja realmente excluir este agendamento?')">
            <i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </main>

<script>
document.querySelectorAll('.status').forEach(select => {
select.addEventListener('change', function() {

     let novoStatus = this.value;
     let id = this.dataset.id;
     let elemento = this;
    fetch('../../backend/atualizar-status.php', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/x-www-form-urlencoded'
         },
         body: `id=${id}&status=${novoStatus}`
     })
     .then(response => response.text())
     .then(data => {
        console.log(data);
        // só altera a cor se salvou no banco
         if(data.trim() === "Atualizado"){
             elemento.className = "status " + novoStatus;
         }
     })
     .catch(error => {
         console.log(error);
     });
   });
});
</script>

</body>
</html>
