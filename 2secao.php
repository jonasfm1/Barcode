<?php
include ('0conexao.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

echo $usuario," - ", $senha;

$usuario = mysqli_real_escape_string($conn, $usuario);
$senha = mysqli_real_escape_string($conn, $senha);

$query = mysqli_query($conn,"SELECT * FROM clientes WHERE nome ='$usuario' AND senha ='$senha'");
$row = mysqli_num_rows($query);

echo " - ",$row;

if($row>0){
    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['senha'] = $_POST['senha'];
    header("Location: 3homemenu.php");

} else{
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);
    header("Location: 1loginpage.php");
}

?>