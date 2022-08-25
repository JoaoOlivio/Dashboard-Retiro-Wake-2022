<?php

include '../../classes/conexao.php';

if(isset($_POST['btn-fechar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email= $_POST['email'];
    $pagamentos= $_POST['pagamentos'];
    $status= $_POST['status'];

    $result_cursos = "UPDATE pessoas SET pessoa_nome='$nome', pessoa_email='$email', pessoa_lote='$pagamentos', pessoa_status = '$status' WHERE pessoa_id = '$id'";
    
    $resultado_cursos = mysqli_query($conexao, $result_cursos);	
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>

<body> <?php
    if(mysqli_affected_rows($conexao) != 0){ 
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../retirantes.php'>
            <script type=\"text/javascript\">
                alert(\"Dados alterado com Sucesso.\");
            </script>
        ";	
        //header('Location: painel.php');
    }else{
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../retirantes.php'>
            <script type=\"text/javascript\">
                alert(\"Não foi alterado com Sucesso os dados.\");
            </script>
        ";	
    }?>
</body>
</html>