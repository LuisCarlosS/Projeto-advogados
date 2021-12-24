<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "projetoadvogados";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno($conn)){
    echo "Erro na conexao com banco de dados: " . mysqli_connect_error();
    exit;
}