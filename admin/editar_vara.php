<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tbvara WHERE id = " .$id;
$resultSet = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultSet) == 0){
    echo "Nenhuma movimentação encontrada";
    exit;
}

$registro = mysqli_fetch_assoc($resultSet);
?>
<div id="mensagem">
    <div class="subtitulo">
        <h3>Editar vara</h3>
    </div>

    <form action="confirmar_edicao_vara.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Nome:</label><br><br>
            <input type="text" name="nome_vara" id="nome_vara" value="<?=$registro["nome_vara"] ?>"><br><br>
        </div>
        <div>
            <label for="">Endereço:</label><br><br>
            <input type="text" name="endereco" id="endereco" value="<?=$registro["endereco"] ?>"><br><br>
        </div>
        <div>
            <label for="">Telefone:</label><br><br>
            <input type="text" name="telefone" id="telefone" data-mask="(99)99999-9999" value="<?=$registro["telefone"] ?>"><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar vara" id="btn">
        </div>
    </form>
    <div id="resposta"></div>
</div>

<?php require_once "../components/rodape.php"; ?>