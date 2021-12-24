<?php require_once "../components/topoadm.php"; ?>
<?php

require_once "../funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM tbcliente WHERE id = " . $id;
if(mysqli_query($conn, $sql)){
    echo "Cliente excluido com sucesso!";
}else{
    echo "Erro ao excluir o cliente!";
}

mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>