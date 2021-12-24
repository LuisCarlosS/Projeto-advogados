<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tbcliente WHERE id = " .$id;
$resultSet = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultSet) == 0){
    echo "Nenhuma movimentação encontrada";
    exit;
}

$registro = mysqli_fetch_assoc($resultSet);
?>
<div id="mensagem">
    <div class="subtitulo">
        <h3>Editar cliente</h3>
    </div>

    <form action="confirmar_edicao_cliente.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Nome:</label><br><br>
            <input type="text" name="nome" id="nome" value="<?=$registro["nome"] ?>"><br><br>
        </div>
        <div>
            <label for="">Cpf:</label><br><br>
            <input type="text" name="cpf" id="cpf" value="<?=$registro["cpf"] ?>"><br><br>
        </div>
        <div>
            <label for="">Email:</label><br><br>
            <input type="text" name="email" id="email" value="<?=$registro["email"] ?>"><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar cliente" id="btn">
        </div>
    </form>
    <div id="resposta"></div>
</div>

<?php require_once "../components/rodape.php"; ?>