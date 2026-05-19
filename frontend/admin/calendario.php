<?php
include '../../backend/conexao.php';

$sql = "SELECT 
            agendamento.id_agendamento,
            cliente.nome,
            cliente.contato_cliente,
            servicos.tipo_servico,
            agendamento.data_agen,
            agendamento.horario,
            agendamento.status_agendamento

        FROM agendamento

        INNER JOIN cliente
            ON agendamento.id_cliente = cliente.id_cliente

        INNER JOIN servicos
            ON agendamento.id_servicos = servicos.id_servicos";

$stmt = $pdo->prepare($sql);
$stmt->execute();

?>

<?php
  session_start();
  
  $nomeCompleto = $_SESSION["nome"];
  $primeiroNome = strtok($nomeCompleto, " ");

  if(!$_SESSION["logado"]){
    $_SESSION["erro"] = 2;
    header("Location:../login.php");
  }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js"></script>
    <link rel="shortcut icon" href="../../assets/img/icon/favicon.ico" type="image/x-icon">
    <title>Calendário</title>
</head>
<body>
    <header>
        <nav class="topbar">
            <a href="../index.php"><img src="../../assets/img/logo/logo-white.png" alt="StudioFlow" class="logo"></a>
            <h4>Seja bem-vindo(a) ao Painel de agendamentos, <?php echo $primeiroNome; ?>!</h4>
            <a href="../../backend/logout.php" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </nav>
    </header>
    <aside>
        <nav class="sidebar">
            <div class="nav-links">
                <a href="calendario.php" style="color: var(--red);"><i class="fa-regular fa-calendar icon" style="color: var(--red);"></i> Calendário</a>
                <a href="agendamentos.php"><i class="fa-regular fa-file-lines icon"></i> Agendamentos</a>
                <a href="historico.php"><i class="fa-solid fa-clock-rotate-left icon"></i> Histórico</a>
                <a href="dashboard.php"><i class="fa-solid fa-chart-line icon"></i> Dashboard</a>
                <a href="profissionais.php"><i class="fa-regular fa-user icon"></i> Profissionais</a>
            </div>
        </nav>
    </aside>

    <main>
    <h2>Calendário</h2>
    <p>Gerencie sua agenda</p>
    <div id="calendar">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');
  
        let calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale: 'pt-br',
          headerToolbar: {
            left: '',
            center: 'title',
            right: 'prev,next'
          }
        });
        calendar.render();
      });
      </script>
      </div>
      <table><br>
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
              <td><?php echo htmlspecialchars($row['horario']); ?></td>
              <td><?php echo htmlspecialchars($row['contato_cliente']); ?></td>
              <td>
              <select name="status" class="status"data-id="<?php echo $row['id_agendamento']; ?>">
              <option value="pendente"<?php if($row['status_agendamento'] == 'pendente') echo 'selected'; ?>class="pendente">Pendente</option>
              <option value="confirmado"<?php if($row['status_agendamento'] == 'confirmado') echo 'selected'; ?>class="confirmado">Confirmado</option>
              <option value="finalizado"<?php if($row['status_agendamento'] == 'finalizado') echo 'selected'; ?>class="finalizado">Finalizado</option>
              <option value="cancelado"<?php if($row['status_agendamento'] == 'cancelado') echo 'selected'; ?>class="cancelado">Cancelado</option>
            </select>
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <a href="criar-agendamento.php" class="btn">Criar Agendamento</a>
</main>
<script>
function aplicarStatus(select){
  select.classList.remove("confirmado", "cancelado", "pendente", "finalizado");

  if(select.value === "Confirmado"){
    select.classList.add("confirmado");
  }
  else if(select.value === "Cancelado"){
    select.classList.add("cancelado");
  }
  else if(select.value === "Pendente"){
    select.classList.add("pendente");
  }
  else if(select.value === "Finalizado"){
    select.classList.add("finalizado");
  }
}

document.querySelectorAll("select").forEach(select => {
  aplicarStatus(select);

  select.addEventListener("change", function() {
    aplicarStatus(this);
  });
});
</script>
</body>
</html>
<?php
  }
?>