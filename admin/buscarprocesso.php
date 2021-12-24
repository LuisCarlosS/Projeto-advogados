<?php
require_once "../components/topoadm.php";
require_once "../funcoes/conexoes.php";
require_once "../funcoes/funcao.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Processos</h2>
    </div>
    <div class="subtitulo">
        <h3>Buscar processo</h3>
    </div>
    <form action="buscarprocesso.php" method="POST" id="buscar" class="l-00">
        <div class="l-01">
            <label for="advogado">Advogado:</label>
            <select type="text" name="advogado" id="advogado">
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
        <div class="l-01">
            <label for="cliente">Cliente:</label>
            <select type="text" name="cliente" id="cliente">
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
        <div class="l-01">
            <label for="situacao">Status:</label>
            <select type="text" name="situacao" id="situacao">
                <option value="">TODOS</option>
                <option value="aberto">Aberto</option>
                <option value="ganho">Ganho</option>
                <option value="perdido">Perdido</option>           
            </select><br><br>
        </div>
        <div class="clear"></div>
        <input type="submit" value="Buscar" id="btn-00">
    </form>

    <div>
        <?php

        if($_POST){

            $advogado = $_POST["advogado"];
            $cliente = $_POST["cliente"];
            $situacao = $_POST["situacao"];

            $sql = "SELECT p.id, p.nr_processo, p.dt_inicio, p.dt_termino, p.status, p.pago, p.vl_processo, 
            p.vl_custo, p.descricao, a.nome_adv, c.nome  
            FROM tbprocesso p 
            INNER JOIN tbadvogado a ON p.advogado_id = a.id 
            INNER JOIN tbcliente c ON p.cliente_id = c.id
            WHERE a.id LIKE '".$advogado."%'";

            if($cliente != ""){
                $sql .=  "AND c.id = " .$cliente;
            }

            if($situacao != ""){
                $sql .= " AND p.status = '".$situacao."'";
            }

            $resultSet = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultSet) > 0){
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nº PROC.</th>
                    <th>INICIO</th>
                    <th>TERMINO</th>
                    <th>STATUS</th>
                    <th>VL PAGO</th>
                    <th>VL PROC.</th>
                    <th>CUSTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>ADVOGADO</th>
                    <th>CLIENTE</th>
                    <th>AÇÃO</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $registro = mysqli_fetch_assoc($resultSet)){ ?>
                <tr>
                    <td><?=$registro["nr_processo"]?></td>
                    <td><?=formatDateFromDb($registro["dt_inicio"])?></td>
                    <td><?=formatDateFromDb($registro["dt_termino"])?></td>
                    <td><?=$registro["status"]?></td>
                    <td>R$ <?=number_format($registro["pago"],2,",",".")?></td>
                    <td>R$ <?=number_format($registro["vl_processo"],2,",",".")?></td>
                    <td>R$ <?=number_format($registro["vl_custo"],2,",",".")?></td>
                    <td><?=$registro["descricao"]?></td>
                    <td><?=$registro["nome_adv"]?></td>
                    <td><?=$registro["nome"]?></td>
                    <td>
                        <a href="editar_processo.php?id=<?=$registro["id"]?>" class="btn btn-edit">
                            <i class="fas fa-edit"></i> 
                        </a>

                        <a href="deletar_processo.php?id=<?=$registro["id"]?>" onclick="return excluir()" class="btn btn-remove">
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
    </div>
</div>
<?php require_once "../components/rodape.php";?>