<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";
require_once "../funcoes/funcao.php";

?>
<div id="mensagem">
<div id="titulo">
    <h2>Audiência</h2>
</div>
<div class="subtitulo">
    <h3>Buscar audiencia</h3>
</div>
<form action="buscaraudiencia.php" method="post" id="buscar">
    <div>
        <label for="advogado">Advogado:</label><br><br>
        <select type="text" name="nome_adv" id="nome_adv">
            <option value="">TODOS</option>
            <?php
            $sql = "select id, nome_adv from tbadvogado order by nome_adv";
            $resultSetAdvogado = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultSetAdvogado) > 0){
                while($registroAdvogado = mysqli_fetch_assoc($resultSetAdvogado)){
                    echo "<option value='" . $registroAdvogado["id"]. "'>" 
                    . $registroAdvogado["nome_adv"]. "</option>";
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

        $nome_adv = $_POST["nome_adv"];
        
        $sql = "SELECT a.id, a.dt_audiencia, a.hr_audiencia, a.descricao, a.status, v.nome_vara, p.nr_processo, d.nome_adv  
                FROM tbaudiencia a 
                INNER JOIN tbvara v ON a.vara_id = v.id 
                INNER JOIN tbprocesso p ON a.processo_id = p.id 
                INNER JOIN tbadvogado d ON a.advogado_id = d.id
                WHERE d.id LIKE '".$nome_adv."%'";

        $resultSet = mysqli_query($conn, $sql);
        if(mysqli_num_rows($resultSet) > 0){
?>

    <table>
        <thead>
            <tr>
                <th>DATA</th>
                <th>HORA</th>
                <th>DESCRIÇÃO</th>
                <th>STATUS</th>
                <th>VARA</th>
                <th>PROCESSO</th>
                <th>ADVOGADO</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
            <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
            <tr>
                <td><?=formatDateFromDb($registro["dt_audiencia"])?></td>
                <td><?=$registro["hr_audiencia"]?></td>
                <td><?=$registro["descricao"]?></td>
                <td><?=$registro["status"]?></td>
                <td><?=$registro["nome_vara"]?></td>
                <td><?=$registro["nr_processo"]?></td>
                <td><?=$registro["nome_adv"]?></td>
                <td>
                    <a href="editar_audiencia.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                        <i class="fas fa-edit"></i> 
                    </a>

                    <a href="deletar_audiencia.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
        }
    }
        else{
            echo (Mysqli_error($conn));
        }
    ?>
<?php require_once "../components/rodape.php";?>