<?php require_once "components/topo.php";?>

<div id="entrar">
    <h3 class="subtitulo">Entre ou Cadastre-se</h3><br>

        <?php if(isset($_GET["m"])){ ?>
            <div id="message">
                <?=base64_decode($_GET["m"])?>
            </div>
        <?php } ?>

	<form action="logar.php" method="post">
		<div>
            <label for="usuario">Usuário:</label><br><br>
            <input type="text" name="usuario" id="usuario"><br><br>
        </div>
        <div>
            <label for="senha">Senha:</label><br><br>
            <input type="password" name="senha" id="senha"><br><br>
        </div>
		<input type="submit" id="btn" value="Entrar no sistema">
	</form>
	<a class="cadastrar" href="cadastraradvogado.php">Cadastrar</a>
</div>

<?php require_once "components/rodape.php"; ?>