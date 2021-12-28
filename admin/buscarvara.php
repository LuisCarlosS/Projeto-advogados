<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Vara</h2>
    </div>
    <div class="subtitulo">
        <h3>Buscar vara</h3>
    </div>
    <form action="buscarvara.php" method="post" id="buscar">
        <div>
            <label for="">Nome:</label><br><br>
            <select name="nome_vara" id="nome_vara">
                <option value="">TODOS</option>
                <?php
                $sql = "select id, nome_vara from tbvara order by nome_vara";
                $resultSetVara = mysqli_query($conn, $sql);
                if(mysqli_num_rows($resultSetVara) > 0){
                    while($registroVara = mysqli_fetch_assoc($resultSetVara)){
                        echo "<option value='" . $registroVara["id"]. "'>" 
                        . $registroVara["nome_vara"]. "</option>";
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

        $nome_vara = $_POST["nome_vara"];
        
        $sql = "SELECT id, nome_vara, endereco, telefone 
        FROM tbvara WHERE id LIKE '".$nome_vara."%' order by nome_vara";

        $resultSet = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultSet) > 0){
    ?>

    <table>
        <thead>
            <tr>
                <th>NOME</th>
                <th>ENDEREÇO</th>
                <th>TELEFONE</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["nome_vara"]?></td>
                <td><?=$registro["endereco"]?></td>
                <td><?=$registro["telefone"]?></td>
                <td>
                    <a href="editar_vara.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>

                    <a href="deletar_vara.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
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