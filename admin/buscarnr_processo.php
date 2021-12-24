<?php

$nr_processo  = $_POST["nr_processo"];

require_once "../funcoes/conexoes.php";

$sql = "SELECT id, dt_inicio, dt_termino, status, pago, vl_processo, vl_custo, descricao, advogado_id, cliente_id 
FROM tbprocesso WHERE nr_processo = '" .$nr_processo. "' limit 1";
$rsProcesso = mysqli_query($conn, $sql);
if(mysqli_num_rows($rsProcesso) > 0){
    $processo = mysqli_fetch_assoc($rsProcesso);
    echo json_encode([ 'status' => 'ok', 'message' => 'Número de processo já cadastrado!', 'processo' => [
        'id' => $processo["id"], 'dt_inicio' => $processo["dt_inicio"], 'dt_termino' => $processo["dt_termino"], 'status' => $processo["status"], 'pago' => $processo["pago"], 
        'vl_processo' => $processo["vl_processo"], 'vl_custo' => $processo["vl_custo"], 'descricao' => $processo["descricao"], 'advogado_id' => $processo["advogado_id"], 'cliente_id' => $processo["cliente_id"]
    ]]);
}else{
    echo json_encode([ 'status' => 'error', 'message' => 'Número de processo ainda não cadastrado!']);
}
