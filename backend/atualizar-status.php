<?php
require_once 'conexao.php';

// Atualização de status
if(isset($_POST['id']) && isset($_POST['status'])){

    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE agendamento
            SET status_agendamento = :status
            WHERE id_agendamento = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo "Atualizado";
    }else{
        echo "Erro";
    }

    exit;
}

// Atualização do formulário de edição
if(isset($_POST['id_agendamento'])){

    $idAgendamento = $_POST['id_agendamento'];
    $idCliente = $_POST['id_cliente'];
    $idServico = $_POST['id_servicos'];

    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $sqlCliente = "UPDATE cliente
                   SET nome = :nome, contato_cliente = :contato
                   WHERE id_cliente = :idCliente";

    $stmtCliente = $pdo->prepare($sqlCliente);
    $stmtCliente->bindParam(':nome', $nome);
    $stmtCliente->bindParam(':contato', $contato);
    $stmtCliente->bindParam(':idCliente', $idCliente);
    $stmtCliente->execute();

    $sqlServico = "UPDATE servicos
                   SET tipo_servico = :servico
                   WHERE id_servicos = :idServico";

    $stmtServico = $pdo->prepare($sqlServico);
    $stmtServico->bindParam(':servico', $servico);
    $stmtServico->bindParam(':idServico', $idServico);
    $stmtServico->execute();

    $sqlAgendamento = "UPDATE agendamento
                       SET data_agen = :data, horario = :horario
                       WHERE id_agendamento = :idAgendamento";

    $stmtAgendamento = $pdo->prepare($sqlAgendamento);
    $stmtAgendamento->bindParam(':data', $data);
    $stmtAgendamento->bindParam(':horario', $horario);
    $stmtAgendamento->bindParam(':idAgendamento', $idAgendamento);

    if($stmtAgendamento->execute()){
        header("Location: ../frontend/admin/agendamentos.php");
        exit;
    }else{
        echo "Erro ao atualizar.";
    }
}

// Atualiza o status do profissional
if(isset($_POST['id_profissional']) && isset($_POST['status_profissional']) && !isset($_POST['nome'])){

    $id = $_POST['id_profissional'];
    $status = $_POST['status_profissional'];

    $sql = "UPDATE profissional
            SET status_profissional = :status
            WHERE id_profissional = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo "Atualizado";
    }else{
        echo "Erro";
    }

    exit;
}

// Atualiza os dados do profissional
if(isset($_POST['id_profissional'])){

    $id = $_POST['id_profissional'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $especialidade = $_POST['especialidade'];
    $status = $_POST['status_profissional'];

    $sql = "UPDATE profissional
            SET nome = :nome,
                contato_prof = :contato,
                especialidade = :especialidade,
                status_profissional = :status_profissional
            WHERE id_profissional = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':contato', $contato);
    $stmt->bindParam(':especialidade', $especialidade);
    $stmt->bindParam(':status_profissional', $status);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        header("Location: ../frontend/admin/profissionais.php");
        exit;
    }else{
        echo "Erro ao atualizar profissional.";
    }
}

// Excluir agendamento
if(isset($_GET['excluir'])){

    $idAgendamento = $_GET['excluir'];

    $sql = "SELECT id_cliente, id_servicos FROM agendamento WHERE id_agendamento = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $idAgendamento);
    $stmt->execute();
    $dados = $stmt->fetch();

    if($dados){

        $idCliente = $dados['id_cliente'];
        $idServico = $dados['id_servicos'];

        $sqlAgendamento = "DELETE FROM agendamento WHERE id_agendamento = :id";

        $stmtAgendamento = $pdo->prepare($sqlAgendamento);
        $stmtAgendamento->bindParam(':id', $idAgendamento);
        $stmtAgendamento->execute();

        $sqlServico = "DELETE FROM servicos WHERE id_servicos = :id";

        $stmtServico = $pdo->prepare($sqlServico);
        $stmtServico->bindParam(':id', $idServico);
        $stmtServico->execute();

        $sqlCliente = "DELETE FROM cliente WHERE id_cliente = :id";

        $stmtCliente = $pdo->prepare($sqlCliente);
        $stmtCliente->bindParam(':id', $idCliente);
        $stmtCliente->execute();
    }

    header("Location: ../frontend/admin/agendamentos.php");
    exit;
}

// Excluir profissional
if(isset($_GET['excluir_profissional'])){

    $id = $_GET['excluir_profissional'];

    $sql = "DELETE FROM profissional
            WHERE id_profissional = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        header("Location: ../frontend/admin/profissionais.php");
        exit;
    }else{
        echo "Erro ao excluir profissional.";
    }
}
?>