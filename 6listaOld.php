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

	<link rel="stylesheet" type="text/css" href="estilos/lista.css" />

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

	<div class="lista">
		<table class='tabela' border="2">
			<?php

			$consul = "SELECT * FROM barras_geral";
			$execon = mysqli_query($conn, $consul);
			while ($exibe = mysqli_fetch_array($execon)) {
				echo "<tr> <td>" . $exibe['barcode'] . "</td>", "<td>" . $exibe['empresa'] . "</td>", "<td>" .
					$exibe['endereco'] . "</td>", "<td>" . $exibe['bairro'] . "</td>", "<td>" . $exibe['cidade'] . "</td>", "<td>" . $exibe['cep'] . "</td>",
					"<td>" . $exibe['estado'] . "</td>",
					"<td>" . $exibe['colaborador'] . "</td>",
					"<td>" . $exibe['cpf'] . "</td>",
					"<td>" . $exibe['pedido'] .
						"</td>",
					"<td>" . $exibe['periodo'] . "</td>",
					"<td>" . $exibe['situacao'] . "</td>";
			}
			?>
		</table>
	</div>

</body>

</html>