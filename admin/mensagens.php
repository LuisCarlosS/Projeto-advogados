<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Mensagens</h2>
    </div>
    <div class="subtitulo">
        <h3>Ver mensagens</h3>
    </div>
    <form action="mensagens.php" method="post" id="buscar">
        <div>
            <label for="">Assunto:</label><br><br>
            <select name="assunto" id="assunto">
                <option value="">TODOS</option>
                <?php
                $sql = "select id, assunto from tbmensagem order by assunto";
                $resultSetMensagem = mysqli_query($conn, $sql);
                if(mysqli_num_rows($resultSetMensagem) > 0){
                    while($registroMensagem = mysqli_fetch_assoc($resultSetMensagem)){
                        echo "<option value='" . $registroMensagem["id"]. "'>" 
                        . $registroMensagem["assunto"]. "</option>";
                    }
                }
                ?>
            </select><br><br>
        </div>
        <div class="clear"></div>
        <input type="submit" value="Buscar" id="btn-00">
    </form>

    <?php

        if($_POST){

        $assunto = $_POST["assunto"];
        
        $sql = "SELECT id, email, assunto, mensagem 
        FROM tbMensagem WHERE id LIKE '".$assunto."%' order by assunto";

        $resultSet = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultSet) > 0){
    ?>

    <table>
        <thead>
            <tr>
                <th>EMAIL</th>
                <th>ASSUNTO</th>
                <th>MENSAGEM</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["email"]?></td>
                <td><?=$registro["assunto"]?></td>
                <td><?=$registro["mensagem"]?></td>
                <td>
                    <a href="deletar_Mensagem.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
    }
}
    else{
        echo (Mysqli_error($conn));
    
}
?>
<?php require_once "../components/rodape.php";?>