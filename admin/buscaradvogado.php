<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Advogados</h2>
    </div>
    <div class="subtitulo">
        <h3>Buscar advogado</h3>
    </div>
    <form action="buscaradvogado.php" method="post" id="buscar">
        <div>
            <label for="">Nome:</label><br><br>
            <select name="nome_adv" id="nome_adv">
                <option value="">TODOS</option>
                <?php
                $sql = "select id, nome_adv from tbadvogado order by nome_adv";
                $resultSetAdvogado = mysqli_query($conn, $sql);
                if(mysqli_num_rows($resultSetAdvogado) > 0){
                    while($registroAdvogado = mysqli_fetch_assoc($resultSetAdvogado)){
                        echo "<option value='" . $registroAdvogado["nome_adv"]. "'>" 
                        . $registroAdvogado["nome_adv"]. "</option>";
                    }
                }
                ?>
            </select><br><br>
        </div>
        <div class="clear"></div>
        <input type="submit" value="Buscar" id="btn-00">
    </form>

    <div>
        <?php

            if($_POST){
            
            $nome_adv = $_POST["nome_adv"];
            
            $sql = "SELECT id, nome_adv, usuario, senha, nr_oab FROM tbadvogado a WHERE a.nome_adv LIKE '".$nome_adv."%'";
            
            $resultSet = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultSet) > 0){
        ?>

        <table>
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>USUÁRIO</th>
                    <th>SENHA</th>
                    <th>NÚMERO DA OAB</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
                <tr>
                    <td><?=$registro["nome_adv"]?></td>
                    <td><?=$registro["usuario"]?></td>
                    <td><?=$registro["senha"]?></td>
                    <td><?=$registro["nr_oab"]?></td>
                    <td>
                        <a href="editar_advogado.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                            <i class="fas fa-edit"></i> 
                        </a>
                
                        <a href="deletar_advogado.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
            }
            else{
                echo (Mysqli_error($conn));
            }
        }
        ?>
    </div>
</div>
<?php require_once "../components/rodape.php";?>