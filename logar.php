<?php

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

include "conexao.php";
$sql = "SELECT * FROM tb_usuarios where usu_id = 'usu_cod', usu_login = '$usuario' and usu_senha = '$senha'; ";

$resultado = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($resultado);
if ($registros > 0 ){
    session_start();
while ($linhas = mysqli_fetch_assoc($resultado)){
    $_SESSION['id'] = $linha['usu_cod'];
    $_SESSION['usuario'] = $linha['usu_login'];
    $_SESSION['senha'] = $linha['usu_senha'];
}
header("Location logado.php");
}else{
    header("Location: index.php");
}

?>