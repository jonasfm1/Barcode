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

    <link rel="stylesheet" href="bar-css/styles.css">
    <link rel="stylesheet" href="bar-css/example.css">
    <link rel="stylesheet" href="bar-css/pygment_trac.css">

    <script type="text/javascript" src="bootjs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootjs/bootstrap.min.js"></script>
    <link href="bootcss/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <script src="jscript/quagga.min.js" type="text/javascript"></script>
    <script src="jscript/file.input2.js" type="text/javascript"></script>
    <script src="jscript/scale.fix.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos/insereimg.css" />

    <title>CODIGO DE BARRAS</title>

</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-dark" style="border-radius:5px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="3homemenu.php">Home<span class="sr-only">(Página atual)</span></a>
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
                    <a class="nav-link" href="Logoff.php">Sair</a>
                </ul>
            </ul>
        </div>
    </nav>

    <!-- Término do contador de arquivos  -->
    <div class="faz">
        <ul id="criando">

        </ul>
    </div>


    <div class="tudo">
        <div id="result_strip">
            <ul class="thumbnails"></ul>
        </div>
    </div>


    <div class="entradas">
        <div class="controls">
            <fieldset class="input-group">
                <input type="file" accept="image/*;capture=camera" multiple="multiple" enctype="multipart/form-data" />
            </fieldset>
        </div>


        <form method="post" enctype="multipart/form-data" action="9salvando.php" multiple="multiple">

            <input type="hidden" id='imgEnviar' name='imgEnviar' />

            <input type="text" id='codQr' name='codQr' />
            <input type="submit" value="Salvar" />
        </form>
    </div>
    <div id="galeria"></div>

    <button onclick="pegaimg();">processar</button>

    <script>
        function pegaimg() {
            var pegtag = document.querySelectorAll("#galeria img").length;
            c = 0;

            while (c < pegtag) {
                var pegimg = document.getElementsByTagName("img")[c].src;// Pegando Imagem na posicao do vetor
                $('#imgEnviar').val($('#imgEnviar').val() + ';;' + pegimg);
                

                var idimg = document.getElementsByClassName("imagens")[c].id;// Pegando id Na posicao do vetor
                $('#codQr').val( idimg + ";" + $('#codQr').val());// ok
                c++
            }
        };
    </script>

</body>

</html>