<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <a href="index.php"><img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo"></a>
</nav>

<main>
    <form action="admin/calendario.php" method="POST">
        <h2>Login</h2>
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>
        <label>Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        <button type="submit">Entrar</button>
        <p>Primeiro acesso? <a href="cadastro.php">Cadastre-se</a></p>
    </form>
</main>

</body>
</html>
