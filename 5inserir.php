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

	<meta charset="utf-8">
	<script type="text/javascript" src="bootjs/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="bootjs/bootstrap.min.js"></script>
	<link href="bootcss/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="estilos/inserir.css" />

	<title>Inserir Base</title>

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
					<a class="nav-link" href="5inserir.php"> Inserir Base </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="7inseririmg.php"> Inserir imagens </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="6lista.php"> Lista </a>
				</li>
				<ul class="sair">
					<a class="nav-link" href="8Logoff.php"> Sair </a>
				</ul>
			</ul>
		</div>
	</nav>

	<div class="container">

		<form method="POST" action="4LoadExcel.php" enctype="multipart/form-data">

			<label for="arquivo">Procurar</label>
			<input id="arquivo" type="file" name="file">
			<span id="nome-arquivo"></span>

			<label for="enviar" class="enviar">Enviar</label>
			<input id="enviar" type="submit" value="Enviar">
		</form>
	</div>

	<footer>
		Caddesign - Tecnologia e Inteligência Geográfica &copy;
	</footer>

	<script>
		var input = document.getElementById('arquivo'),
			fileName = document.getElementById('nome-arquivo');

		input.addEventListener('change', function() {
			fileName.textContent = this.value;
		});
	</script>

</body>

</html>