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

		.navbar-brand{
			font-style: italic;
			color: #ff98cd;
		}
		.nav-link{
			color: #ffffff;
		}

	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg "  style="background-color: #2A4080;">

<a class="navbar-brand" href="#">
	  <img src="logo.png" alt="Bootstrap" width="90" height="72">
</a>
  
<div class="container-fluid">
  <a class="navbar-brand" href="index.html">LocadoraDreams</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	<div class="navbar-nav">
	  <a class="nav-link" href="usuarios.php">Usuários</a>
	  <a class="nav-link" href="livros.php">Livros</a>
	  <a class="nav-link" href="emprestimo.php">Empréstimos</a>
	  <a class="nav-link" href="editora.php">Editoras</a>
	  <a class="nav-link" href="atrasos.php">Atrasos</a>
	  <a class="nav-link " href="dashboard.php" class="dashboard-button">Dashboard</a>
	  <a class="nav-link " href="logout.php">Sair</a>
	</div>
  </div>
</div>
</nav>


<br><br>
	<div class="row">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading display-6 text-center">Cadastro de Livros</div>
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
    						<input type="submit" name="btn" value="Cadastrar" class="btn-bg">

   						</form>

				</div>
			</div>
		</div>			
	</div>
</body>
</html>
