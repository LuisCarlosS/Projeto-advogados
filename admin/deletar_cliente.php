<?php require_once "../components/topoadm.php"; ?>
<?php

require_once "../funcoes/conexoes.php";

$id = $_GET["id"];

$sql = "DELETE FROM tbcliente WHERE id = " . $id;
if(mysqli_query($conn, $sql)){
    echo "<div class= mensagem>Cliente excluido com sucesso!</div>";
}else{
    echo "<div class= mensagem>Erro ao excluir o cliente!</div>";
}

mysqli_close($conn);
?>
<?php require_once "../components/rodape.php"; ?>