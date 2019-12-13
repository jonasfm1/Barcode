<?php

//////////////////////////// Incluido arquivo de conexaõ
include("0conexao.php");
//////////////////////////// Chamada para a biblioteca PhpExcel
require_once 'Classes/PHPExcel.php';

//////////////////////////// Recebendo Arquivo do Form e tratando
$excel = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);

////////////////////////////Primeira pasta de trabalho excel
$excel->setActiveSheetIndex(0);

//////////////////////////// Iniciando contador
$i = 1;
$cupdate = 0;
$cinsert = 0;

//////////////////////////// Iniciando Loop para pegar valore do arquivo Excel.Xlsx
while ($excel->getActiveSheet()->getCell("A" . $i)->getValue() != "") {

    $barcode = $excel->getActiveSheet()->getCell("A" . $i)->getValue();
    $empresa = $excel->getActiveSheet()->getCell("B" . $i)->getValue();
    $endereco = $excel->getActiveSheet()->getCell("C" . $i)->getValue();
    $bairro = $excel->getActiveSheet()->getCell("D" . $i)->getValue();
    $cidade = $excel->getActiveSheet()->getCell("E" . $i)->getValue();
    $cep = $excel->getActiveSheet()->getCell("F" . $i)->getValue();
    $estado = $excel->getActiveSheet()->getCell("G" . $i)->getValue();
    $colaborador = $excel->getActiveSheet()->getCell("H" . $i)->getValue();
    $cpf = $excel->getActiveSheet()->getCell("I" . $i)->getValue();
    $pedido = $excel->getActiveSheet()->getCell("J" . $i)->getValue();
    $periodo = $excel->getActiveSheet()->getCell("K" . $i)->getValue();

    //////////////////////////// Selecionando banco e conferindo a tabela
    $query_qual = "select * from barras_geral where barcode='$barcode'";
    $query_qual = mysqli_query($conn, $query_qual);
    $num_rows = mysqli_num_rows($query_qual);

    //////////////////////////// Checando se ja resultados iguais ou diferentes para atualizar a tabela

    if ($num_rows == 1) {

        $query = "UPDATE barras_geral SET empresa='$empresa', endereco='$endereco', bairro='$bairro', cidade='$cidade', cep='$cep', estado='$estado', colaborador='$colaborador', cpf='$cpf', pedido='$pedido', periodo='$periodo', situacao='Atualizado' where barcode='$barcode'";

        $cupdate++;
    } else {
        $query = "INSERT INTO barras_geral (barcode, empresa, endereco, bairro, cidade, cep, estado, colaborador, cpf, pedido, periodo, situacao) VALUES ('$barcode','$empresa', '$endereco', '$bairro','$cidade', '$cep', '$estado', '$colaborador', '$cpf', '$pedido', '$periodo','Novo')";

        $cinsert++;
    }

    //////////////////////////// executando as instruções das query MySQL
    $resultado_usuario = mysqli_query($conn, $query);

    //////////////////////////// Contador recebendo +1
    $i++;
}
?>
<script>
    var cupdate = <?php print $cupdate ?>;
    window.location.href = "5lista.php";
    alert(cupdate +" Registros Atualizados com Sucesso");
</script>
