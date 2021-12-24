<?php require_once "../components/topoadm.php"; ?>
<?php

require_once "../funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM tbaudiencia WHERE id = " . $id;
if(mysqli_query($conn, $sql)){
    echo "Audiência excluida com sucesso!";
}else{
    echo "Erro ao excluir a audiência!";
}

mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>