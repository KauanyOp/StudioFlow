<?php
 //Inicia sessão, verifica se existe usuario logado e abrevia o nome do usuario
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
      </div><br><br>
        <a href="criar-agendamento.php" class="btn">Criar Agendamento</a>
</main>
</body>
</html>
<?php
  }
?>