<?php require_once "../components/topoadm.php"; ?>
<?php
    $id = $_POST["id"];
    $dt_termino = $_POST["dt_termino"];
    $status = $_POST["status"];
    $vl_processo = $_POST["vl_processo"];
    $vl_custo = $_POST["vl_custo"];
    $advogado_id = $_POST["advogado_id"];
    $descricao = $_POST["descricao"];

    if($dt_termino == "" || $status == "" || $vl_processo == "" || $vl_custo == "" || $advogado_id == "" || $descricao == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbprocesso SET dt_termino = '".$dt_termino."', status = '".$status."', vl_processo = '".$vl_processo."', vl_custo = '".$vl_custo."', advogado_id = '".$advogado_id."', descricao = '".$descricao."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div class= edicao>Processo editado com sucesso!</div>";
    }else{
        echo "<div class= edicao>Processo não pode ser editado!</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>