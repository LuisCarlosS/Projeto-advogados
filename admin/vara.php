<?php require_once "../components/topoadm.php";?>

<div id="mensagem">
    <div id="titulo">
        <h2>Vara</h2>
        <ul>
            <li><a href="buscarvara.php">Ver varas</a></li>
        </ul>
    </div>
    <div class="subtitulo">
        <h3>Nova vara</h3>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

    <form action="salvar_vara.php" method="post">
        <div>
            <label for="">Nome:</label><br><br>
            <input type="text" name="nome_vara" id="nome_vara"><br><br>
        </div>
        <div>
            <label for="">Endereço:</label><br><br>
            <input type="text" name="endereco" id="endereco"><br><br>
        </div>
        <div>
            <label for="">Telefone:</label><br><br>
            <input type="text" name="telefone" id="telefone" data-mask="(99)99999-9999"><br><br>
        </div>
        <div>
            <input type="submit" value="Salvar vara" id="btn">
        </div>
    </form>
</div>

<?php require_once "../components/rodape.php"; ?>