<?php require_once "../components/topoadm.php";?>

<div id="mensagem">
    <div id="titulo">
        <h2>Clientes</h2>
        <ul>
            <li><a href="buscarcliente.php">Ver clientes</a></li>
            <li><a href="mensagens.php">Mensagens</a></li>
        </ul>
    </div>
    <div class="subtitulo">
        <h3>Novo cliente</h3>
    </div>
    <?php if(isset($_GET["m"])){ ?>
        <div id="message">
            <?=base64_decode($_GET["m"])?>
        </div>
    <?php } ?>

    <form action="salvar_cliente.php" method="post">
        <div>
            <label for="">Cpf:</label><br><br>
            <input type="text" name="cpf" id="cpf" data-mask="999.999.999-99"><br><br>
        </div>
        <div id="telacliente" style="display: none">
        <div>
            <label for="">Nome:</label><br><br>
            <input type="text" name="nome" id="nome"><br><br>
        </div>
        <div>
            <label for="">E-mail:</label><br><br>
            <input type="email" name="email" id="email"><br><br>
        </div>
        <div>
            <input type="submit" value="Cadastrar cliente" id="btn">
        </div>
    </form>
</div>

<script>
    document.getElementById("cpf").addEventListener("blur", (event) => {
        let cpf = event.target.value
        if(cpf != ""){

            let formData = new FormData()
            formData.append("cpf", cpf)

            fetch('buscarcpf.php',{
                method : 'POST',
                body : formData
            })
            .then( result => result.json() )
            .then(result => {
                if(result.status == "ok"){
                    alert(result.message);
                    document.getElementById("telacliente").style.display = "none"
                    
                }else{
                    document.getElementById("telacliente").style.display = "block"
                }
            })
            .catch(erro => {
                console.log(erro)
                document.getElementById("telacliente").style.display = "none"
            })


            document.getElementById("telacliente").style.display = "block"
        }
       
    else{
            document.getElementById("telacliente").style.display = "none"
        }
    })
</script>

<?php require_once "../components/rodape.php"; ?>