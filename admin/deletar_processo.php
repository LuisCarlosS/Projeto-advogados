<?php require_once "../components/topoadm.php"; ?>
<?php

require_once "../funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM tbprocesso WHERE id = " . $id;
if(mysqli_query($conn, $sql)){
    echo "Processo excluido com sucesso!";
}else{
    echo "<p>Erro ao excluir o processo!</p>";
}

mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>