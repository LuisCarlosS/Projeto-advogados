<?php

require_once 'funcoes/conexoes.php';

$usuario = mysqli_escape_string($conn, trim($_POST["usuario"]));
$senha = mysqli_escape_string($conn, trim($_POST["senha"]));

//$senha = md5($senha);

$sql = "select * from tbadvogado where usuario = '".$usuario."' AND senha = '".$senha."' ";
$resultSetUsuario = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultSetUsuario) == 0){
    mysqli_close($conn);
    header("location: entrar.php?m=" . base64_encode("Usuario/senha inválidos"));
    exit;
}

$row = mysqli_fetch_assoc($resultSetUsuario);
mysqli_close($conn);
header("location: admin/processos.php");