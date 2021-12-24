<?php require_once "../components/topoadm.php"; ?>
<?php

require_once "../funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM tbvara WHERE id = " . $id;
if(mysqli_query($conn, $sql)){
    echo "Vara excluida com sucesso!";
}else{
    echo "Erro ao excluir a vara!";
}

mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>