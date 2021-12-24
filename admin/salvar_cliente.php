<?php

    $nome = trim($_POST["nome"]);
    $cpf = trim($_POST["cpf"]);
    $email = trim($_POST["email"]);

    require_once "../funcoes/conexoes.php";

    if($nome == "" || $cpf == "" || $email == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbcliente VALUES(NULL, '".$nome."', '".$cpf."', '".$email."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Cliente cadastrado com sucesso!";
    }else{
        $msg = "Não foi possível efetuar o cadastro!";
    }

    mysqli_close($conn);
    header("location: cadastrarclientes.php?m=" . base64_encode($msg));