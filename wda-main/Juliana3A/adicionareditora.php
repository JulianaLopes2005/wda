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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6afff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
			font-style: italic;
        }

		.btn-bg{
			padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            background-color: #ff81ff;
            color: #ffffff;
            border: none;
            cursor: pointer;
		}

	</style>

</head>
<body>

<br><br>
	<div class="row">
		<div class="container col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
				<a href="editora.php"><i style="font-size:24px" class="fa">&#xf00d;</i></a>
					<div class="panel-heading display-6 text-center">Cadastro de Editoras</div>
    					<form action="addeditora.php" method="post" accept-charset="utf-8" class="form-group">

    						<label for="nome_editora">Nome:</label>
    						<input type="text" name="nome_editora" class="form-control" required>
    						<br>
    						<label for="email_editora">Email:</label>
    						<input type="email" name="email_editora" class="form-control" required>
                            <br>
    						<label for="telefone">Telefone:</label>
    						<input type="text" id="telefone" name="telefone" class="form-control" required>
                            <br>
                            <label for="site_editora">Site:</label>
    						<input type="text" name="site_editora" class="form-control">

    						<br>
    						<input type="submit" name="btn" value="Cadastrar" class="btn-bg">
		<script>
		$(document).ready(function() {
			$('#telefone').mask('(00) 00000-0000');
		});
		</script>

        </form>
				
		<script>
            function formatar(mascara, documento) {
                var i = documento.value.length;
                var saida = '#';
                var texto = mascara.substring(i);
                while (texto.substring(0, 1) != saida && texto.length) {
                    documento.value += texto.substring(0, 1);
                    i++;
                    texto = mascara.substring(i);
                }
            }
        </script>
				</div>
			</div>
		</div>			
	</div>
</body>
</html>