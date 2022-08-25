<?php

include '../../classes/conexao.php';

if (isset($_POST['btn-fechar-excluir'])) {
    $id = $_POST['pessoa_id'];
    $sql = "DELETE FROM pessoas WHERE pessoa_id=$id";
    if (mysqli_query($conexao, $sql)) {
        header("location: ../retirantes.php");
    } else {
        echo "Erro";
    }
}
