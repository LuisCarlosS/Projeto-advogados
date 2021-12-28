<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Clientes</h2>
    </div>
    <div class="subtitulo">
        <h3>Buscar cliente</h3>
    </div>
    <form action="buscarcliente.php" method="post" id="buscar">
        <div>
            <label for="">Nome:</label><br><br>
            <select name="nome" id="nome">
                <option value="">TODOS</option>
                <?php
                $sql = "select id, nome from tbcliente order by nome";
                $resultSetCliente = mysqli_query($conn, $sql);
                if(mysqli_num_rows($resultSetCliente) > 0){
                    while($registroCliente = mysqli_fetch_assoc($resultSetCliente)){
                        echo "<option value='" . $registroCliente["id"]. "'>" 
                        . $registroCliente["nome"]. "</option>";
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

        $nome = $_POST["nome"];
        
        $sql = "SELECT id, nome, cpf, email 
        FROM tbcliente WHERE id LIKE '".$nome."%' order by nome";

        $resultSet = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultSet) > 0){
    ?>

    <table>
        <thead>
            <tr>
                <th>NOME</th>
                <th>CPF</th>
                <th>EMAIL</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=$registro["nome"]?></td>
                <td><?=$registro["cpf"]?></td>
                <td><?=$registro["email"]?></td>
                <td>
                    <a href="editar_cliente.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>

                    <a href="deletar_cliente.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
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