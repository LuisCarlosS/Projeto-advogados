<?php

    $email = trim($_POST["email"]);
    $assunto = trim($_POST["assunto"]);
    $mensagem = trim($_POST["mensagem"]);

    require_once "../funcoes/conexoes.php";

    if($email == "" || $assunto == "" || $mensagem == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbmensagem VALUES(NULL, '".$email."', '".$assunto."', '".$mensagem."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Mensagem enviada com sucesso!";
    }else{
        $msg = "Não foi possível enviar a mensagem!";
    }

    mysqli_close($conn);
    header("location: /advogados/index.php?m=" . base64_encode($msg));