<?php
session_start();
include('0conexao.php');

if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
	header("location:1loginpage.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<script type="text/javascript" src="bootjs/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="bootjs/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootcss/bootstrap.min.css"/>

	<link rel="stylesheet" type="text/css" href="estilos/home.css" />

	<title>Caddesign Barcode</title>

</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-dark" style="border-radius:5px">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="textoNavbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="3homemenu.php">Home <span class="sr-only">(Página atual)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="5inserir.php">Inserir Base</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="7inseririmg.php">Inserir imagens</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="6lista.php">Lista</a>
				</li>
				<ul class="sair">
					<a class="nav-link" href="8Logoff.php">Sair</a>
				</ul>
			</ul>
		</div>
	</nav>


	<nav>
		<div class="item">
			<input  type="checkbox" id="check1">
			<label for="check1">Duvidas Frequentes</label>
			<ul>
				<li>
					<a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Como inserir Base Excel</a>
				</li>
				<div class="collapsing" id="collapseExample">
					<div class="card card-body bg-dark">
						Para importar uma base com novos dados antess de mas nada limpe a base e coloque ela na ordem de entrada sem cabeçalho.
						apos isto pasta clicar em procurar selecionar o arquivo abrir e clicar em enviar
					</div>
				</div>

				<li>
					<a data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">Como Verificar Codigos</a>
				</li>
				<div class="collapse" id="collapseExample2">
					<div class="card card-body bg-dark">
						Para importar codigos de barras caneia as imagens apos escaniadas acesse a pagina de inserir imagens escolha os arquivos e cliquem em executar,
						se tudo estiver certo clique em salvar e esta feito.
					</div>
				</div>

				<li>
					<a data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">Como Verificar Codigos</a>
				</li>
				<div class="collapse" id="collapseExample3">
					<div class="card card-body bg-dark">
						Para a verificaçção de codigos de barras check o status se esta verde ou vermelho e check se a foto comtem assinatura.
					</div>
				</div>
			</ul>
		</div>
	</nav>

</body>

</html>
