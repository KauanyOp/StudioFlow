<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <nav class="topbar">
            <a href="calendario.php"><img src="../../assets/img/logo/logo-white.png" alt="StudioFlow" class="logo"></a>
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
                <tr>
                    <td>Kauany Oliveira</td>
                    <td>Tatuagem</td>
                    <td>13/05/2026</td>
                    <td>14:00</td>
                    <td>(11) 99999-9999</td>
                    <td>
                        <select name="status" id="status">
                            <option value="" class=" "></option>
                            <option value="Confirmado" class=" confirmado">Confirmado</option>
                            <option value="Finalizado" class=" finalizado">Finalizado</option>
                            <option value="Cancelado" class=" cancelado">Cancelado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Giovanna Rodrigues</td>
                    <td>Remoção</td>
                    <td>14/05/2026</td>
                    <td>10:00</td>
                    <td>(11) 98888-8888</td>
                    <td>
                        <select name="status" id="status">
                            <option value="" class=" "></option>
                            <option value="Confirmado" class=" confirmado">Confirmado</option>
                            <option value="Finalizado" class=" finalizado">Finalizado</option>
                            <option value="Cancelado" class=" cancelado">Cancelado</option>
                        </select>
                    </td>   
                </tr>
                 <tr>
                    <td>Paulo Henrique</td>
                    <td>Flash Tattoo</td>
                    <td>15/05/2026</td>
                    <td>16:00</td>
                    <td>(11) 97777-7777</td>
                    <td>
                        <select name="status" id="status">
                            <option value="" class=" "></option>
                            <option value="Confirmado" class=" confirmado">Confirmado</option>
                            <option value="Finalizado" class=" finalizado">Finalizado</option>
                            <option value="Cancelado" class=" cancelado">Cancelado</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Davi Xavier</td>
                    <td>Cobertura</td>
                    <td>16/05/2026</td>
                    <td>11:00</td>
                    <td>(11) 96666-6666</td>
                    <td>
                        <select name="status" id="status">
                            <option value="" class=" "></option>
                            <option value="Confirmado" class=" confirmado">Confirmado</option>
                            <option value="Finalizado" class=" finalizado">Finalizado</option>
                            <option value="Cancelado" class=" cancelado">Cancelado</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
</main>

<script>
document.querySelectorAll("select").forEach(select => {
  select.addEventListener("change", function() {
    this.classList.remove("confirmado", "cancelado", "finalizado");

    if(this.value === "Confirmado"){
      this.classList.add("confirmado");
    }
    else if(this.value === "Cancelado"){
      this.classList.add("cancelado");
    }
    else if(this.value === "Finalizado"){
      this.classList.add("finalizado");
    }
  });
});
</script>

</body>
</html>
