<?php require_once "../components/topoadm.php"; ?>
<?php
    $id = $_POST["id"];
    $dt_audiencia = $_POST["dt_audiencia"];
    $hr_audiencia = $_POST["hr_audiencia"];
    $status = $_POST["status"];
    $vara_id = $_POST["vara_id"];
    $processo_id = $_POST["processo_id"];
    $advogado_id = $_POST["advogado_id"];
    $descricao = $_POST["descricao"];

    if($dt_audiencia == "" || $hr_audiencia == "" || $status == "" || $vara_id == "" || $processo_id == "" || $advogado_id == "" || $descricao == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    require_once "../funcoes/conexoes.php";

    $sql = "UPDATE tbaudiencia SET dt_audiencia = '".$dt_audiencia."', hr_audiencia = '".$hr_audiencia."', status = '".$status."', vara_id = '".$vara_id."', processo_id = '".$processo_id."', advogado_id = '".$advogado_id."', descricao = '".$descricao."' WHERE id = '".$id."'";

    if(mysqli_query($conn, $sql)){
        echo "<div class= edicao>Audiência editada com sucesso!</div>";
    }else{
        echo "<div class= edicao>Audiência não pode ser editada!</div>";
    }

    mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>