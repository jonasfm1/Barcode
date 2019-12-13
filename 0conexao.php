<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "cadd";
	$dbname = "bar_code_sb";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	if(!$conn){
		echo ("Falha na Conexão com o Banco de Dados". mysql_error());
	}else{
		echo "CONNECTADO COM SUCESSO";
	}

?>