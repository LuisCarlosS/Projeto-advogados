<?php

    $nr_processo = trim($_POST["nr_processo"]);
    $dt_inicio = trim($_POST["dt_inicio"]);
    $dt_termino = trim($_POST["dt_termino"]);
    $status = trim($_POST["status"]);
    $pago = trim($_POST["pago"]);
    $vl_processo = trim($_POST["vl_processo"]);
    $vl_custo = trim($_POST["vl_custo"]);
    $descricao = trim($_POST["descricao"]);
    $advogado_id = trim($_POST["advogado_id"]);
    $cliente_id = trim($_POST["cliente_id"]);

    require_once "../funcoes/conexoes.php";

    if($nr_processo == "" || $dt_inicio == "" || $dt_termino == "" || $status == "" || $pago == "" || $vl_processo == "" || $vl_custo == "" || $descricao == "" || $advogado_id == "" || $cliente_id == ""){
        echo "Preencha todos os campos obrigatórios!";
        exit;
    }

    $sql = "INSERT INTO tbprocesso VALUES(NULL, '".$nr_processo."', '".$dt_inicio->format('Y-m-d')."', '".$dt_termino->format('Y-m-d')."', '".$status."', '".$pago."', '".$vl_processo."', '".$vl_custo."', '".$descricao."', '".$advogado_id."', '".$cliente_id."')";

    if(mysqli_query($conn, $sql)){
        $msg = "Processo salvo com sucesso!";
    }else{
        $msg = "Não foi possível salvar o processo";
    }

    mysqli_close($conn);
    header("location: processos.php?m=" . base64_encode($msg));