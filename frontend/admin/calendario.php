<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js"></script>
    <title>Calendário</title>
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
        <div id="calendar"></div>
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
        <table>
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
                <tr>
                    <td>Kauany Oliveira</td>
                    <td>Tatuagem</td>
                    <td>(11) 99999-9999</td>
                    <td>13/05/2026</td>
                    <td>14:00</td>
                    <td>
                        <select name="status" class="status">
                            <option value="Pendente" class="pendente">Pendente</option>
                            <option value="Confirmado" class="confirmado">Confirmado</option>
                            <option value="Cancelado" class="cancelado">Cancelado</option>
                        </select>
                    </td>
                    <td>
                        <a href="editar-agendamento.php?id=1" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-agendamento.php?id=1"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Giovanna Rodrigues</td>
                    <td>Remoção</td>
                    <td>(11) 98888-8888</td>
                    <td>14/05/2026</td>
                    <td>10:00</td>
                    <td>
                        <select name="status" class="status">
                            <option value="Pendente" class="pendente">Pendente</option>
                            <option value="Confirmado" class="confirmado">Confirmado</option>
                            <option value="Cancelado" class="cancelado">Cancelado</option>
                        </select> 
                    </td>
                    <td>
                        <a href="editar-agendamento.php?id=2" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-agendamento.php?id=2"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>
                </tr>
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