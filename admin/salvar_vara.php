<?php

    $nome_vara = trim($_POST["nome_vara"]);
    $endereco = trim($_POST["endereco"]);
    $telefone = trim($_POST["telefone"]);

    require_once "../funcoes/conexoes.php";

    if($nome_vara == "" || $endereco == "" || $telefone == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbvara VALUES(NULL, '".$nome_vara."', '".$endereco."', '".$telefone."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Vara cadastrada com sucesso!";
    }else{
        $msg = "Não foi possível efetuar o cadastro!";
    }

    mysqli_close($conn);
    header("location: vara.php?m=" . base64_encode($msg));