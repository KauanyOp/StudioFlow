<?php require_once 'conexao.php';

if(isset($_POST['id']) && isset($_POST['status'])){

    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE agendamento SET status_agendamento = :status WHERE id_agendamento = :id";

    //bindParam faz a conexão da classe status com a variavel
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo "Atualizado";
    }else{
        echo "Erro";
    }
}
?>