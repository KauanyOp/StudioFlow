<?php
require_once '../../backend/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM profissional WHERE id_profissional = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$profissional = $stmt->fetch();

if(!$profissional){
    die("Profissional não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Profissional</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/img/icon/favicon.ico" type="image/x-icon">
</head>
<body>
<main>
    <form action="../../backend/atualizar-status.php" method="POST">
        <input type="hidden" name="id_profissional" value="<?php echo $profissional['id_profissional']; ?>">
        <h2>Editar Profissional</h2>
        <label>Nome Completo</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($profissional['nome']); ?>" required>
        <label>Contato</label>
        <input type="text" name="contato" id="contato" value="<?php echo htmlspecialchars($profissional['contato_prof']); ?>">
        <label>Especialidade</label>
        <select id="especialidade" name="especialidade" required>
          <option value="piercing" <?php if($profissional['especialidade'] == 'piercing') echo 'selected'; ?>>Piercing</option>
          <option value="fineline" <?php if($profissional['especialidade'] == 'fineline') echo 'selected'; ?>>Fine Line</option>
          <option value="old_school" <?php if($profissional['especialidade'] == 'old_school') echo 'selected'; ?>>Old School</option>
          <option value="flash_tattoo" <?php if($profissional['especialidade'] == 'flash_tattoo') echo 'selected'; ?>>Flash Tattoo</option>
          <option value="realista" <?php if($profissional['especialidade'] == 'realista') echo 'selected'; ?>>Realista</option>
          <option value="lettering" <?php if($profissional['especialidade'] == 'lettering') echo 'selected'; ?>>Lettering</option>
          <option value="blackout" <?php if($profissional['especialidade'] == 'blackout') echo 'selected'; ?>>Blackout</option>
          <option value="anime" <?php if($profissional['especialidade'] == 'anime') echo 'selected'; ?>>Anime</option>
          <option value="cobertura" <?php if($profissional['especialidade'] == 'cobertura') echo 'selected'; ?>>Cobertura</option>
        </select>
        <button type="submit">Editar</button>
    </form>
</main>

</body>
</html>
