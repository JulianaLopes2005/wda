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
	<title>Página do Cadastro de Livros</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>


	<div class="row">
		<div class="container col-sm-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading display-4 text-center">Cadastro de Livros</div>
    					<form action="funcadastrolivro.php" method="post" accept-charset="utf-8" class="form-group">

    						<label for="nome">Nome:</label>
    						<input type="text" name="nome" class="form-control" required>
    						<br>
    						<label for="autor">Autor:</label>
    						<input type="text" name="autor" class="form-control" required>
                            <br>
						
    						<label for="editora">Editora:</label>
        					<select name="editora" id="editora" required>
            				<option value="">Selecione a Editora</option>
							<?php
							// Realiza a conexão com o banco de dados
							include('conexao.php');

							// Busca as editoras cadastradas
							$query = "SELECT * FROM editora";
							$resultado = mysqli_query($conn, $query);

							// Exibe as opções do select com base nas editoras encontradas
							while ($editora = mysqli_fetch_assoc($resultado)) {
								echo '<option value="' . $editora['nome_editora'] . '">' . $editora['nome_editora'] . '</option>';
							}
							?>
							</select><br><br>

                            <label for="datalanc">Data de lançamento:</label>
    						<input type="date" name="datalanc" class="form-control" required>
                            <br>
                            <label for="estoque">Estoque:</label>
    						<input type="text" name="estoque" class="form-control">

    						<br>
    						<input type="submit" name="btn" value="Cadastrar" class="btn btn-success">

   						</form>

				</div>
			</div>
		</div>			
	</div>
</body>
</html>