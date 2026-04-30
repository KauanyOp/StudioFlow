<?php 

session_start();
$erro = $_SESSION["erro"] ?? 0;
unset($_SESSION["erro"]);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <a href="index.php"><img class="logo" src="../assets/img/logo/logo-white.png" alt="StudioFlow Logo"></a>
</nav>

<main>
    <form action="../backend/validarlogin.php" method="POST">
        <?php
    if($erro == 1){
        echo "<p class='erro'>Usuário e/ou senha incorretos!</p>";
    } else{
    if ($erro == 2){
        echo "<p class='erro'>Efetue login!</p>";
    }
    }
    ?>
        <h2>Login</h2>
        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>
        <label>Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        <button type="submit">Entrar</button> <br>
        <p><a href="cadastro.php">Primeiro acesso? Cadastre-se</a></p>
    </form>

</main>
</body>
</html>
