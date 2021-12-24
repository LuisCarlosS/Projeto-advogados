<?php
require_once "components/topo.php";
?>
    <div id="servicos">
        <h3>SERVIÇOS</h3>
        <h4>Especialidades:</h4>
        <p>Cível, Contratos, Trabalhista, Mediação e Ambiental</p>
        <h4>Atuação:</h4>
        <p>Contencioso Cível, Contencioso Trabalhista, Consultoria Empresarial, Contencioso de volume e Processos Administrativos</p>
        <h4>Setores:</h4>
        <p>Energia, Seguros, Telefonia, Transporte, Indústria, Comércio, Construção Civil e Naval e Instituições Financeiras</p>
    </div>
    <div id="contato">
        <h3>FALE COM A GENTE</h3>
        <?php if(isset($_GET["m"])){ ?>
            <div id="message">
                <?=base64_decode($_GET["m"])?>
            </div>
        <?php } ?>
        <form action="admin/salvar_mensagens.php" method="post">
            <div class="emailassunto">
                <div>
                    <label for="">Email:</label><br><br>
                    <input type="email" name="email" id="email"><br><br>
                </div>
                <div>
                    <label for="">Assunto:</label><br><br>
                    <input type="text" name="assunto" id="assunto"><br><br>
                </div>
            </div>
            <div>
                <label for="">Mensagem:</label><br><br>
                <textarea name="mensagem" id="mensagem"></textarea><br><br>
            </div>
            <input type="submit" value="Enviar" id="btn">
        </form>
    </div>
<?php require_once "components/rodape.php"; ?>