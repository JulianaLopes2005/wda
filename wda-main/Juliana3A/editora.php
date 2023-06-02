<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editoras</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.bundle.min.js"></script>

	<style>
		.table-striped{
			background: #E6E6FA;
		}

		.d-flex{
			width: 25%;
			height: 2rem;
			float: right;
			margin: 5px;
		}

		.btn-bg{
            font-size: 14px;
            border-radius: 4px;
            background-color: #ff81ff;
            color: #ffffff;
            border: none;
            cursor: pointer;
			margin-left: 5px;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg "  style="background-color: #2A4080;">

		<a class="navbar-brand" href="#">
      		<img src="logo.png" alt="Bootstrap" width="90" height="72">
    	</a>
          
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html" style="font-style: italic;
			color: #ff98cd;">LocadoraDreams</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="usuarios.php" style="color: #ffffff">Usuários</a>
			  <a class="nav-link" href="livros.php" style="color: #ffffff">Livros</a>
			  <a class="nav-link" href="emprestimo.php" style="color: #ffffff">Empréstimos</a>
			  <a class="nav-link" href="editora.php" style="color: #ffffff">Editoras</a>
			  <a class="nav-link " href="dashboard.php" class="dashboard-button" style="color: #ffffff">Dashboard</a>
			  <a class="nav-link " href="logout.php" style="color: #ffffff">Sair</a>
            </div>
          </div>
        </div>
      </nav>
	  <br><br>
<div class="container">
<center><h1>Lista de Editoras</h1></center>
	  <br>
	  <a href="adicionareditora.php" type="button" class="btn btn-success">Adicionar Editora</a>
	  <div class="pesquisa">
    <form class="d-flex" method="GET">
	<input class="form-control me-2" type="search" name="search" placeholder="pesquisar..." aria-label="search">
	 	  <select name="filter">
				<option value="id">ID</option>
				<option value="nome_editora">Nome</option>
				<option value="email_editora">Email</option>
				<option value="telefone">Telefone</option>
				<option value="site_editora">Site</option>
		  </select>
	<button class="btn-bg" type="submit">Pesquisar</button>
    </form>
	</div>

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Site</th>
			<th></th>
		</tr>
		<?php
			include 'conexao.php'; 
			
			if (isset($_GET['search']) && isset($_GET['filter'])) {
                $search = $_GET['search'];
                $filter = $_GET['filter'];
                $sql = "SELECT * FROM editora WHERE $filter LIKE '%$search%' ORDER BY nome_editora ASC";
            } else {
                // Consultar usuários sem critérios de pesquisa
                $sql = "SELECT * FROM editora ORDER BY nome_editora ASC";
            }

			$result = mysqli_query($conn, $sql);

			$result = mysqli_query($conn, $sql);
			// Exibir resultados
			//Se tiver mais de um registro
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["nome_editora"]."</td>";
					echo "<td>".$row["email_editora"]."</td>";
					echo "<td>".$row["telefone"]."</td>";
					echo "<td>".$row["site_editora"]."</td>";


				}
			} else {
				echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
			}
			// Fechar conexão
			mysqli_close($conn);
		?>
	</table>
	</div>
	</div>		
</body>
</html>