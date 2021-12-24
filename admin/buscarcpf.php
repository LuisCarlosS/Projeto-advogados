<?php

$cpf  = $_POST["cpf"];

require_once "../funcoes/conexoes.php";

$sql = "SELECT id, nome, cpf, email 
FROM tbcliente WHERE cpf = '" .$cpf. "' limit 1";
$rsCliente = mysqli_query($conn, $sql);
if(mysqli_num_rows($rsCliente) > 0){
    $cliente = mysqli_fetch_assoc($rsCliente);
    echo json_encode([ 'status' => 'ok', 'message' => 'Cpf já cadastrado!', 'cliente' => [
        'id' => $cliente["id"], 'nome' => $cliente["nome"], 'cpf' => $cliente["cpf"], 'email' => $cliente["email"]]]);
}else{
    echo json_encode([ 'status' => 'error', 'message' => 'Cpf ainda não cadastrado!']);
}
