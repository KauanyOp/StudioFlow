<?php
require_once '../../backend/conexao.php';

// Total de agendamentos
$sqlTotal = "SELECT COUNT(*) AS total FROM agendamento";
$totalAgendamentos = $pdo->query($sqlTotal)->fetch()['total'];
$sqlConcluidos = "SELECT COUNT(*) AS total FROM agendamento WHERE status_agendamento = 'finalizado'";
$concluidos = $pdo->query($sqlConcluidos)->fetch()['total'];
$sqlMes = "SELECT COUNT(*) AS total FROM agendamento WHERE MONTH(data_agen) = MONTH(CURRENT_DATE()) AND YEAR(data_agen) = YEAR(CURRENT_DATE())";
$mensais = $pdo->query($sqlMes)->fetch()['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/icon/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
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
                <a href="historico.php"><i class="fa-solid fa-clock-rotate-left icon"></i> Histórico</a>
                <a href="dashboard.php" style="color: var(--red);"><i class="fa-solid fa-chart-line icon" style="color: var(--red);"></i> Dashboard</a>
                <a href="profissionais.php"><i class="fa-regular fa-user icon"></i> Profissionais</a>
            </div>
        </nav>
    </aside>

    <main>
        <h2>Dashboard</h2>
        <p>Visão geral das suas estatísticas</p>
        <div class="cards-dash">
            <div class="card">
                <i class="fa-regular fa-calendar icon-dash"></i>
                <p>Total Agendamentos</p>
                <h2><?php echo $totalAgendamentos; ?></h2>
            </div>
            <div class="card">
                <i class="fa-regular fa-square-check icon-dash"></i>
                <p>Atendimentos Concluídos</p>
                <h2><?php echo $concluidos; ?></h2>
            </div>
            <div class="card">
                <i class="fa-solid fa-chart-line icon-dash"></i>
                <p>Atendimentos Mensais</p>
                <h2><?php echo $mensais; ?></h2>
            </div>
        </div>

        <div class="chart-container">
          <canvas id="grafico"></canvas>
        </div>
        <script>
            const ctx = document.getElementById('grafico');

            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: [
                  'Total Agendamentos',
                  'Concluídos',
                  'Atendimentos Mensais'
                ],

                datasets: [{
                  data: [
                  <?php echo $totalAgendamentos; ?>,
                  <?php echo $concluidos; ?>,
                  <?php echo $mensais; ?>], 

                  backgroundColor: [
                    '#80162483',  
                    'rgba(255, 255, 255, 0.2)',  
                    'rgba(255, 99, 132, 0.2)'   
                  ],

                  borderColor: [
                    '#a6051a',
                    '#c0c0c0',
                    '#ff4d4d'
                  ],

                  borderWidth: 1
                }]
              },

              options: {
                plugins: {
                  legend: {
                    display: false
                  }
                },
                scales: {
                  x: {
                    ticks: {
                      color: 'white'
                    },
                    grid: {
                      color: 'rgba(255,255,255,0.1)'
                    }
                  },
                  y: {
                    beginAtZero: true,
                    ticks: {
                      color: 'white'
                    },
                    grid: {
                      color: 'rgba(255,255,255,0.1)'
                    }
                  }
                }
              }
            });
        </script>
  </main>
 </body>
</html>