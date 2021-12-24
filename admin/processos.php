<?php require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

$sql = "select * from tbadvogado order by nome_adv";
$resultSetAdvogado = mysqli_query($conn, $sql);

$sql = "select * from tbcliente order by nome";
$resultSetCliente = mysqli_query($conn, $sql);
?>

<div id="mensagem">
    <div id="titulo">
        <h2>Processos</h2>
        <ul>
            <li><a href="buscarprocesso.php">Ver processos</a></li>
        </ul>
    </div>
    <div class="subtitulo">
        <h3>Novo processo</h3>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

    <form action="salvar_processo.php" method="post">
        <div>
            <label for="">Número do processo:</label><br><br>
            <input type="text" name="nr_processo" id="nr_processo"><br><br>
        </div>
        <div id="telaprocesso" style="display: none">
        <div>
            <label for="">Data do início:</label><br><br>
            <input type="date" name="dt_inicio" id="dt_inicio"><br><br>
        </div>
        <div>
            <label for="">Data do termino:</label><br><br>
            <input type="date" name="dt_termino" id="dt_termino"><br><br>
        </div>
        <div class="status">
            <label for="">Status:</label><br><br>
            <select name="status" id="status">
                <option value=""></option>
                <option value="aberto">Aberto</option>
                <option value="ganho">Ganho</option>
                <option value="perdido">Perdido</option>
            </select><br><br>
        </div>
        <div class="pago">
            <label for="">Valor pago:</label><br><br>
            <input type="number" name="pago" id="pago"><br><br>
        </div>
        <div>
            <label for="">Valor do processo:</label><br><br>
            <input type="number" name="vl_processo" id="vl_processo"><br><br>
        </div>
        <div>
            <label for="">Valor de custo do processo:</label><br><br>
            <input type="number" name="vl_custo" id="vl_custo"><br><br>
        </div>
        <div>
            <label for="advogado">Advogado:</label><br>
            <select name="advogado_id" id="advogado_id">
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
            <label for="cliente">Cliente:</label><br>
            <select name="cliente_id" id="cliente_id">
                <option value=""></option>
                <?php
                    if(mysqli_num_rows($resultSetCliente) > 0){
                        while($registroCliente = mysqli_fetch_assoc($resultSetCliente)){
                            echo "<option value='" . $registroCliente["id"]. "'>" 
                            . $registroCliente["nome"]. "</option>";
                        }
                    }
                ?>
            </select><br><br>
        </div>
        <div>
            <label for="">Descrição:</label><br>
            <textarea cols="43" rows="10" name="descricao" id="descricao"></textarea><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar processo" id="btn">
        </div>
    </form>
</div>

<script>
    document.getElementById("nr_processo").addEventListener("blur", (event) => {
        let nr_processo = event.target.value
        if(nr_processo != ""){

            let formData = new FormData()
            formData.append("nr_processo", nr_processo)

            fetch('buscarnr_processo.php',{
                method : 'POST',
                body : formData
            })
            .then( result => result.json() )
            .then(result => {
                if(result.status == "ok"){
                    alert(result.message);
                    document.getElementById("telaprocesso").style.display = "none"
                    
                }else{
                    document.getElementById("telaprocesso").style.display = "block"
                }
            })
            .catch(erro => {
                console.log(erro)
                document.getElementById("telaprocesso").style.display = "none"
            })


            document.getElementById("telaprocesso").style.display = "block"
        }
       
    else{
            document.getElementById("telaprocesso").style.display = "none"
        }
    })
</script>

<?php require_once "../components/rodape.php"; ?>