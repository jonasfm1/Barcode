<?php
include_once("0conexao.php");

$codQr = $_POST['codQr'];
if (isset($_POST['imgEnviar'])) {
    $imgEnviar = $_POST['imgEnviar'];
    echo $imgEnviar;
}

$listImg = explode(';;',($imgEnviar)); 
array_shift($listImg);

$list = explode(';', $codQr);
array_pop($list);

$g = 0;

while ($g < count($list)) {

    file_put_contents('./imagens_salvas/' . $list[$g] . '.jpeg', file_get_contents($listImg[$g]));
   
    $stmt = "UPDATE barras_geral SET situacao = 'Confirmado' where barcode = $list[$g]";
    

    $resultado_usuario = mysqli_query($conn, $stmt);
    $g++;

    sleep(2);
};
$stmt2 = "UPDATE barras_geral SET situacao = 'Pendente' where situacao <> 'Confirmado'";
$resultado_usuario = mysqli_query($conn, $stmt2);