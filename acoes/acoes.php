<?php

require("../conexao.php");

if(isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $data_nascimento = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_nascimento'])));
    $email = $_POST['email'];
    $profissao = $_POST['profissao'];
    $telefone_contato = $_POST['telefone_contato'];
    $celular_contato = $_POST['celular_contato'];

    if(isset($_POST['celular_tem_whatsapp'])){
        $tem_whatsapp = isset($_POST['celular_tem_whatsapp']);
    } else {
        $tem_whatsapp = 0;
    }

    if(isset($_POST['notificacoes_email'])){
        $notificacoes_email = isset($_POST['notificacoes_email']);
    } else {
        $notificacoes_email = 0;
    }

    if(isset($_POST['notificacoes_sms'])){
        $notificacoes_sms = isset($_POST['notificacoes_sms']);
    } else {
        $notificacoes_sms = 0;
    }
    
    $sql = "insert into tbl_contato (nome, data_nascimento, email, profissao, telefone_contato, celular_contato, celular_tem_whatsapp, notificacoes_email, notificacoes_sms) values ('$nome', '$data_nascimento', '$email', '$profissao', '$telefone_contato', '$celular_contato', $tem_whatsapp, $notificacoes_email, $notificacoes_sms);";

    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        die(mysqli_error($conexao));
    } 

    header("location: ../telas/index.php");

}

if (isset($_POST['editar'])){
    $id_contato = $_GET["id_contato"];
    $nome = $_POST['nome'];
    $data_nascimento = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['data_nascimento'])));
    $email = $_POST['email'];
    $profissao = $_POST['profissao'];
    $telefone_contato = $_POST['telefone_contato'];
    $celular_contato = $_POST['celular_contato'];

    if(isset($_POST['celular_tem_whatsapp'])){
        $tem_whatsapp = isset($_POST['celular_tem_whatsapp']);
    } else {
        $tem_whatsapp = 0;
    }

    if(isset($_POST['notificacoes_email'])){
        $notificacoes_email = isset($_POST['notificacoes_email']);
    } else {
        $notificacoes_email = 0;
    }

    if(isset($_POST['notificacoes_sms'])){
        $notificacoes_sms = isset($_POST['notificacoes_sms']);
    } else {
        $notificacoes_sms = 0;
    }

    $sql = $conexao->prepare("update tbl_contato set nome = ?, data_nascimento = ?, email = ?, profissao = ?, telefone_contato = ?, celular_contato = ?, celular_tem_whatsapp = ?, notificacoes_email = ?, notificacoes_sms = ? where id_contato = ?");
  
    $sql->bind_param('ssssssiiii', $nome, $data_nascimento, $email, $profissao, $telefone_contato, $celular_contato, $tem_whatsapp, $notificacoes_email, $notificacoes_sms, $id_contato);

    if($sql->execute()){
        header("location: ../telas/index.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Erro na atualização de contato:
              </div>'.$sql->error;
    }

}

if(isset($_GET["acao"])){

    $id_contato = $_GET['id_contato'];

    $sql = "delete from tbl_contato where id_contato = $id_contato";

    $resultado = mysqli_query($conexao, $sql);

    header('location: ../telas/index.php');

}