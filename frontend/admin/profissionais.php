<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Profissionais</title>
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
                <tr>
                    <td>Kauany Oliveira</td>
                    <td>Tatuagem</td>
                    <td>(11) 99999-9999</td>
                     <td>
                        <select name="status" class="status">
                            <option value="ativo" class=" ativo">Ativo</option>
                            <option value="inativo" class=" inativo">Inativo</option>
                        </select>
                    </td>
                    <td>
                        <a href="editar-profissional.php?id=1" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-profissional.php?id=1"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Giovanna Rodrigues</td>
                    <td>Remoção</td>
                    <td>(11) 98888-8888</td>  
                    <td>
                        <select name="status" class="status">
                            <option value="ativo" class=" ativo">Ativo</option>
                            <option value="inativo" class=" inativo">Inativo</option>
                        </select>
                    </td>
                    <td>
                        <a href="editar-profissional.php?id=2" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-profissional.php?id=2"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>
                </tr>
                 <tr>
                    <td>Paulo Henrique</td>
                    <td>Flash Tattoo</td>
                    <td>(11) 97777-7777</td>
                    <td>
                        <select name="status" class="status">
                            <option value="ativo" class=" ativo">Ativo</option>
                            <option value="inativo" class=" inativo">Inativo</option>
                        </select>
                    </td>
                    <td>
                        <a href="editar-profissional.php?id=4" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-profissional.php?id=3"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>

                </tr>
                <tr>
                    <td>Davi Xavier</td>
                    <td>Cobertura</td>
                    <td>(11) 96666-6666</td>
                    <td>
                        <select name="status" class="status">
                            <option value="ativo" class=" ativo">Ativo</option>
                            <option value="inativo" class=" inativo">Inativo</option>
                        </select>
                    <td>
                        <a href="editar-profissional.php?id=4" ><i class="fa-regular fa-pen-to-square icon"></i></a>
                        <a href="excluir-profissional.php?id=4"><i class="fa-regular fa-trash-can icon" style="color: var(--cancel);"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="criar-profissional.php" class="btn">Registrar Profissional</a>
</main>

<script>
function aplicarStatus(select){
  select.classList.remove("ativo", "inativo");

  if(select.value === "ativo"){
    select.classList.add("confirmado");
  }
  else if(select.value === "inativo"){
    select.classList.add("cancelado");
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