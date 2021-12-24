<?php require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$sql = "select id, nome_vara from tbvara order by nome_vara";
$resultSetVara = mysqli_query($conn, $sql);

$sql = "select id, nr_processo from tbprocesso";
$resultSetProcesso = mysqli_query($conn, $sql);

$sql = "select id, nome_adv from tbadvogado order by nome_adv";
$resultSetAdvogado = mysqli_query($conn, $sql);

?>

<div id="mensagem">
    <div id="titulo">
        <h2>Audiências</h2>
        <ul>
            <li><a href="buscaraudiencia.php">Ver audiências</a></li>
            <li><a href="vara.php">Nova vara</a></li>
        </ul>
    </div>
    <div class="subtitulo">
        <h3>Nova audiência</h3>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

    <form action="salvar_audiencia.php" method="post">
        <div>
            <label for="">Data da audiência:</label><br><br>
            <input type="date" name="dt_audiencia" id="dt_audiencia"><br><br>
        </div>
        <div>
            <label for="">Hora da audiência:</label><br><br>
            <input type="time" name="hr_audiencia" id="hr_audiencia"><br><br>
        </div>
        <div>
            <label for="">Status:</label><br><br>
            <select name="status" id="status">
                <option value=""></option>
                <option value="ACONTECER">Por acontecer</option>
                <option value="GANHA">Ganha</option>
                <option value="PERDIDA">Perdida</option>
            </select><br><br>
        </div>
        <div>
            <label for="">Vara:</label><br><br>
            <select name="vara_id" id="vara">
                <option value=""></option>
                <?php
                    if(mysqli_num_rows($resultSetVara) > 0){
                        while($registroVara = mysqli_fetch_assoc($resultSetVara)){
                            echo "<option value='" . $registroVara["id"]. "'>" 
                            . $registroVara["nome_vara"]. "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">Processo:</label><br><br>
            <select name="processo_id" id="processo">
                <option value=""></option>
                <?php
                    if(mysqli_num_rows($resultSetProcesso) > 0){
                        while($registroProcesso = mysqli_fetch_assoc($resultSetProcesso)){
                            echo "<option value='" . $registroProcesso["id"]. "'>" 
                            . $registroProcesso["nr_processo"]. "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">Advogado:</label><br><br>
            <select name="advogado_id" id="advogado">
                <option value=""></option>
                <?php
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
            <label for="">Descrição:</label><br><br>
            <textarea cols="" rows="7" name="descricao" id="descricao"></textarea><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar audiência" id="btn">
        </div>
    </form>
</div>
<?php require_once "../components/rodape.php"; ?>