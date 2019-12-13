<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<script type="text/javascript" src="bootjs/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="bootjs/bootstrap.min.js"></script>
	<link href="bootcss/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="estilos/login.css" />

	<title>LoginScreen</title>
</head>

<body>
<div class="login-form">
    <form action="2secao.php" method="post" id="identificar">
		<div class="avatar">
			<img src="imagens/super.jpg" alt="Avatar">
		</div>
        <h2 class="text-center">Login Usuario</h2>   
        <div class="form-group">
        	<input type="text" class="form-control" name="usuario" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="senha" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" form="identificar" >Sign in</button>
        </div>
		<div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>

        </div>
    </form>
</div>
</body>

</html>