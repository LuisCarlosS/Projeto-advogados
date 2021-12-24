<?php require_once "../components/topoadm.php"; ?>
<?php
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];

    if($nome == "" || $cpf == "" || $email == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbcliente SET nome = '".$nome."', cpf = '".$cpf."', email = '".$email."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div class= edicao>Cliente editado com sucesso!</div>";
    }else{
        echo "<div class= edicao>Cliente não pode ser editado!</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>