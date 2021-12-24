<?php
require_once "components/topo.php";
require_once "funcoes/conexoes.php";
require_once "funcoes/funcao.php";

?>
<div id="mensagem">
    <div id="titulo">
        <h2>Processos</h2>
    </div>
    <div class="subtitulo">
        <h3>Buscar processo</h3>
    </div>
    <form action="meuprocesso.php" method="post" id="buscar">
        <div>
            <label for="">Informe o CPF:</label><br><br>
            <input type="text" name="cpf" id="cpf" data-mask="999.999.999-99"><br><br>
        </div>
        <div class="clear"></div>
        <input type="submit" value="Buscar" id="btn-00">
    </form>

    <div>
        <?php

        if($_POST){

            $cpf = $_POST["cpf"];

            $sql = "SELECT p.id, p.nr_processo, p.dt_inicio, p.dt_termino, p.status, p.pago, p.vl_processo, p.descricao, a.nome_adv, c.nome, c.cpf  
            FROM tbprocesso p 
            INNER JOIN tbadvogado a ON p.advogado_id = a.id 
            INNER JOIN tbcliente c ON p.cliente_id = c.id
            WHERE c.cpf LIKE '".$cpf."'";

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
                    <th>DESCRIÇÃO</th>
                    <th>ADVOGADO</th>
                    <th>CLIENTE</th>
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
                    <td><?=$registro["descricao"]?></td>
                    <td><?=$registro["nome_adv"]?></td>
                    <td><?=$registro["nome"]?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
            }
            else{
                echo "Nenhum processo encontrado para este CPF!";
            }
        }   
        
        ?>
    </div>
</div>
<?php require_once "components/rodape.php";?>