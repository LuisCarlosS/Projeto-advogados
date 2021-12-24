<?php require_once "../components/topoadm.php"; ?>
<?php
    $id = $_POST["id"];
    $nome_vara = $_POST["nome_vara"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    if($nome_vara == "" || $endereco == "" || $telefone == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbvara SET nome_vara = '".$nome_vara."', endereco = '".$endereco."', telefone = '".$telefone."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div class= edicao>Vara editada com sucesso!</div>";
    }else{
        echo "<div class= edicao>Vara não pode ser editada!</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>