<?php

    $nome_adv = trim($_POST["nome_adv"]);
    $usuario = trim($_POST["usuario"]);
    $senha = trim($_POST["senha"]);
    $nr_oab = trim($_POST["nr_oab"]);

    require_once "funcoes/conexoes.php";

    if($nome_adv == "" || $usuario == "" || $senha == "" || $nr_oab == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbadvogado VALUES(NULL, '".$nome_adv."', '".$usuario."', '".$senha."', '".$nr_oab."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Advogado cadastrado com sucesso!";
    }else{
        $msg = "Não foi possível efetuar o cadastro";
    }

    mysqli_close($conn);
    header("location: cadastraradvogado.php?m=" . base64_encode($msg));