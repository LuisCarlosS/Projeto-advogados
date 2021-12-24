<?php

$nr_oab  = $_POST["nr_oab"];

require_once "funcoes/conexoes.php";

$sql = "SELECT id, nome_adv, usuario, senha, nr_oab 
FROM tbadvogado WHERE nr_oab = '" .$nr_oab. "' limit 1";
$rsAdvogado = mysqli_query($conn, $sql);
if(mysqli_num_rows($rsAdvogado) > 0){
    $advogado = mysqli_fetch_assoc($rsAdvogado);
    echo json_encode([ 'status' => 'ok', 'message' => 'Número da OAB já cadastrado!', 'advogado' => [
        'id' => $advogado["id"], 'nome_adv' => $advogado["nome_adv"], 'usuario' => $advogado["usuario"], 'senha' => $advogado["senha"], 'nr_oab' => $advogado["nr_oab"]]]);
}else{
    echo json_encode([ 'status' => 'error', 'message' => 'Número da OAB ainda não cadastrado!']);
}
