<?php require_once "../components/topoadm.php"; ?>
<?php
    $id = $_POST["id"];
    $nome_adv = $_POST["nome_adv"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $nr_oab = $_POST["nr_oab"];

    if($nome_adv == "" || $usuario == "" || $senha == "" || $nr_oab == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbadvogado SET nome_adv = '".$nome_adv."', usuario = '".$usuario."', senha = '".$senha."', nr_oab = '".$nr_oab."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div class= edicao>Cadastro editado com sucesso!</div>";
    }else{
        echo "<div class= edicao>Cadastro não pode ser editado!</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>