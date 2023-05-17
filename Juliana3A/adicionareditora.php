<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    header('Location: login.php');
    exit();
}
?>

<?php 
	include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Administrador de Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="row">
		<div class="container col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading display-4 text-center">Cadastro de Editoras</div>
    					<form action="addeditora.php" method="post" accept-charset="utf-8" class="form-group">

    						<label for="nome_editora">Nome:</label>
    						<input type="text" name="nome_editora" class="form-control" required>
    						<br>
    						<label for="email_editora">Email:</label>
    						<input type="email" name="email_editora" class="form-control" required>
                            <br>
    						<label for="telefone">Telefone:</label>
    						<input type="text" name="telefone" class="form-control" required>
                            <br>
                            <label for="site_editora">Site:</label>
    						<input type="text" name="site_editora" class="form-control">

    						<br>
    						<input type="submit" name="btn" value="Cadastrar" class="btn btn-success">

   						</form>
				</div>
			</div>
		</div>			
	</div>
</body>
</html>