<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tbadvogado WHERE id = " .$id;
$resultSet = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultSet) == 0){
    echo "Nenhuma movimentação encontrada";
    exit;
}

$registro = mysqli_fetch_assoc($resultSet);
?>
<div id="mensagem">
    <div class="subtitulo">
        <h3>Editar advogado</h3>
    </div>

    <form action="confirmar_edicao_advogado.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Nome:</label><br>
            <input type="text" name="nome_adv" id="nome_adv" value="<?=$registro["nome_adv"] ?>"><br><br>
        </div>
        <div>
            <label for="">Usuário:</label><br>
            <input type="text" name="usuario" id="usuario" value="<?=$registro["usuario"] ?>"><br><br>
        </div>
        <div>
            <label for="">Senha:</label><br>
            <input type="password" name="senha" id="senha" value="<?=$registro["senha"] ?>"><br><br>
        </div>
        <div>
            <label for="">Número da oab:</label><br>
            <input type="text" name="nr_oab" id="nr_oab" value="<?=$registro["nr_oab"] ?>"><br><br>
        </div>

        <input type="submit" value="Editar Cadastro" id="btn">
    </form>
    <div id="resposta"></div>
</div>

<?php require_once "../components/rodape.php"; ?>