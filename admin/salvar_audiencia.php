<?php

    $dt_audiencia = trim($_POST["dt_audiencia"]);
    $hr_audiencia = trim($_POST["hr_audiencia"]);
    $descricao = trim($_POST["descricao"]);
    $status = trim($_POST["status"]);
    $vara_id = trim($_POST["vara_id"]);
    $processo_id = trim($_POST["processo_id"]);
    $advogado_id = trim($_POST["advogado_id"]);

    require_once "../funcoes/conexoes.php";

    if($dt_audiencia == "" || $hr_audiencia == "" || $descricao == "" || $status == "" || $vara_id == "" || $processo_id == "" || $advogado_id == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbaudiencia VALUES(NULL, '".$dt_audiencia->format('Y-m-d')."', '".$hr_audiencia."', '".$descricao."', '".$status."', '".$vara_id."', '".$processo_id."', '".$advogado_id."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Audiência salva com sucesso!";
    }else{
        $msg = "Não foi possível salvar a audiência";
    }

    mysqli_close($conn);
    header("location: audiencias.php?m=" . base64_encode($msg));