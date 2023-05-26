<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redireciona para a página de login
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
					<div class="panel-heading display-4 text-center">Cadastro de Usuários</div>
    					<form action="add.php" method="post" accept-charset="utf-8" class="form-group">

    						<label for="nome">Nome:</label>
    						<input type="text" name="nome" class="form-control" required>
    						<br>
    						<label for="num">Email:</label>
    						<input type="email" name="email" class="form-control" required>
                            <br>
    						<label for="celular">Celular:</label>
    						<input type="text" name="celular" class="form-control" required>
                            <br>
                            <label for="endereco">Endereço:</label>
    						<input type="text" name="endereco" class="form-control" required>
                            <br>
                            <label for="cpf">CPF:</label>
    						<input type="text" name="cpf" class="form-control">

    						<br>
    						<input type="submit" name="btn" value="Cadastrar" class="btn btn-success">

   						</form>
				</div>
			</div>
		</div>			
	</div>
</body>
</html>