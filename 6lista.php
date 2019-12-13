<?php
include "0conexao.php";
$consul_base = "SELECT * FROM barras_geral";
$resultado_recibo = mysqli_query($conn, $consul_base);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="bootjs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootcss/bootstrap.min.css" />

    <title>Lista Barcode</title>
    <style>
        body{
            overflow-x: hidden;
            font-size: 12pt;
        }
        .sair {
            position: absolute;
            margin-left: 90%;
        }

        h1 {
            margin-left: -10.5%;
            color: blue;
            font-weight: bold;
        }

        .contcontainer.theme-showcaseainer {
            position: relative;
            margin: 0;
            width: 100%;
            font-weight: bold;
        }

        table {
            margin-left: -8%;
            color: blue;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg navbar-light bg-dark" style="border-radius:3px">
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

    <div class="container theme-showcase" role="main">
        <div class="page-header">
            <h1>Lista de recibos</h1>
        </div>
        <div class="row">
            <div class="coluna">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Empresa</th>
                            <th>Endereco</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Cep</th>
                            <th>Estado</th>
                            <th>Colaborador</th>
                            <th>CPF</th>
                            <th>Pedido</th>
                            <th>Periodo</th>
                            <th>Status</th>
                            <th>Configurações_de_Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_recibo = mysqli_fetch_assoc($resultado_recibo)) { ?>
                            <tr ng-repeat="item in lstMov" class="small">
                                <td> <?php echo $row_recibo['barcode']; ?></td>
                                <td> <?php echo $row_recibo['empresa']; ?></td>
                                <td> <?php echo $row_recibo['endereco']; ?></td>
                                <td> <?php echo $row_recibo['bairro']; ?></td>
                                <td> <?php echo $row_recibo['cidade']; ?></td>
                                <td> <?php echo $row_recibo['cep']; ?></td>
                                <td> <?php echo $row_recibo['estado']; ?></td>
                                <td> <?php echo $row_recibo['colaborador']; ?></td>
                                <td> <?php echo $row_recibo['cpf']; ?></td>
                                <td> <?php echo $row_recibo['pedido']; ?></td>
                                <td> <?php echo $row_recibo['periodo']; ?></td>
                                <td> <?php echo $row_recibo['situacao']; ?></td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-primary">Visualizar</button>
                                        <button type="button" class="btn btn-sm btn-warning">Editar</button>
                                        <button type="button" class="btn btn-sm btn-danger">Apagar</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>