<?php require_once '../../backend/conexao.php';
//Seleciona os campos no banco
$sql = "SELECT
       profissional.id_profissional,
       profissional.nome,
       profissional.contato_prof,
       profissional.especialidade,
       profissional.status_profissional
       FROM profissional";

//$stmt = statement(instrução do sql)
$stmt = $pdo->prepare($sql);
$stmt->execute();
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
    <title>Profissionais</title>
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
                <a href="dashboard.php"><i class="fa-solid fa-chart-line icon"></i> Dashboard</a>
                <a href="profissionais.php" style="color: var(--red);"><i class="fa-regular fa-user icon" style="color: var(--red);"></i> Profissionais</a>
            </div>
        </nav>
    </aside>
    <main>
        <h2>Profissionais</h2>
        <p>Gerencie os profissionais do seu estúdio</p>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Especialidade</th>
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
              <td><?php echo ucwords(str_replace('_', ' ', htmlspecialchars($row['especialidade']))); ?></td>
              <td><?php echo htmlspecialchars($row['contato_prof']); ?></td>          
              <td>
              <select name="status" class="status <?php echo $row['status_profissional']; ?>" data-id="<?php echo $row['id_profissional']; ?>">
              <option value="ativo" <?php if($row['status_profissional'] == 'ativo') echo 'selected'; ?> class="ativo">Ativo</option>
              <option value="inativo" <?php if($row['status_profissional'] == 'inativo') echo 'selected'; ?> class="inativo">Inativo</option>
            </select>
            </td>
            <td>
            <a href="editar-profissional.php?id=<?php echo $row['id_profissional']; ?>"><i class="fa-regular fa-pen-to-square icon"></i></a>
            <a href="../../backend/atualizar-status.php?excluir_profissional=<?php echo $row['id_profissional']; ?>" onclick="return confirm('Deseja realmente excluir este profissional?')">
            <i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <a href="../cadastro.php" class="btn">Registrar Profissional</a>
</main>

<script>
function aplicarStatus(select){
    select.classList.remove("confirmado", "cancelado");
    if(select.value === "ativo"){
        select.classList.add("confirmado");
    }else if(select.value === "inativo"){
        select.classList.add("cancelado");
    }
}

document.querySelectorAll(".status").forEach(select => {
    aplicarStatus(select);
    select.addEventListener("change", function() {
        aplicarStatus(this);
        const id = this.dataset.id;
        const status = this.value;

        fetch("../../backend/atualizar-status.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id_profissional=${id}&status_profissional=${status}`
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });

    });
});
</script>
</body>
</html>