<?php

include '../../classes/conexao.php';

if (isset($_POST['cadastroPessoa'])) {
    $pessoa_id = $_POST['pessoa_id'];
    $nome = $_POST['pessoa_nome'];
    $email = $_POST['pessoa_email'];
    $celular = $_POST['pessoa_celular'];
    $idade = $_POST['pessoa_idade'];
    $igreja = $_POST['pessoa_igreja'];
    $lote = $_POST['pessoa_lote'];
    $tipo = $_POST['pessoa_tipo'];
    $area = $_POST['pessoa_area'];
    
    $pagamento_status = "Pendente";

    $sql = "INSERT INTO `pessoas` ( pessoa_nome, pessoa_email, pessoa_status, pessoa_celular, pessoa_idade, pessoa_igreja, pessoa_lote, pessoa_tipo, pessoa_area) 
    VALUES ('$nome','$email', '$pagamento_status', '$celular','$idade', '$igreja', '$lote','$tipo','$area' )";


    if (mysqli_query($conexao, $sql)){
        header("location: ../retirantes.php");
    }
}