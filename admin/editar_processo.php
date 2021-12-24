<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$id = $_GET["id"];
$sql = "SELECT * FROM tbprocesso WHERE id = " .$id;
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

    <form action="confirmar_edicao_processo.php" method="post">
        <input type="hidden" name="id" value="<?=$registro["id"]?>">
        <div>
            <label for="">Data do termino:</label><br><br>
            <input type="date" name="dt_termino" id="dt_termino" value="<?=$registro["dt_termino"] ?>"><br><br>
        </div>
        <div class="status">
            <label for="">Status:</label><br><br>
            <select name="status" id="status" value="<?=$registro["status"] ?>">
                <option value=""></option>
                <option value="aberto">Aberto</option>
                <option value="ganho">Ganho</option>
                <option value="perdido">Perdido</option>
            </select><br><br>
        </div>
        <div class="pago">
            <label for="">Valor pago:</label><br><br>
            <input type="number" name="pago" id="pago" value="<?=$registro["pago"] ?>"><br><br>
        </div>
        <div>
            <label for="">Valor do processo:</label><br><br>
            <input type="number" name="vl_processo" id="vl_processo" value="<?=$registro["vl_processo"] ?>"><br><br>
        </div>
        <div>
            <label for="">Valor de custo do processo:</label><br><br>
            <input type="number" name="vl_custo" id="vl_custo" value="<?=$registro["vl_custo"] ?>"><br><br>
        </div>
        <div>
            <label for="advogado">Advogado:</label><br>
            <select name="advogado_id" id="advogado_id" value="<?=$registro["advogado_id"] ?>">
                <option value=""></option>
                <?php
                    $sql = "select id, nome_adv from tbadvogado order by nome_adv";
                    $resultSetAdvogado = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($resultSetAdvogado) > 0){
                        while($registroAdvogado = mysqli_fetch_assoc($resultSetAdvogado)){
                            echo "<option value='" . $registroAdvogado["id"]. "'>" 
                            . $registroAdvogado["nome_adv"]. "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">Descrição:</label><br>
            <textarea cols="43" rows="10" name="descricao" id="descricao" value="<?=$registro["descricao"] ?>"></textarea><br><br>
        </div>
        <div>
            <input type="submit" value="Editar processo" id="btn">
        </div>
    </form>
    <div id="resposta"></div>
</div>

<?php require_once "../components/rodape.php"; ?>