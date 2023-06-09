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
    <title>Document</title>
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
      <center><h1>Lista de Livros</h1></center>
	  <br>
	<a href="cadastrolivros.php" type="button" class="btn btn-success">Adicionar Livros</a>
	<div class="pesquisa">
    <form class="d-flex" method="GET">
	<input class="form-control me-2" type="search" name="search" placeholder="pesquisar..." aria-label="search">
	 	  <select name="filter">
				<option value="id">ID</option>
				<option value="nome">Nome</option>
				<option value="autor">Autor</option>
				<option value="editora">Editora</option>
		  </select>
	<button class="btn-bg" type="submit">Pesquisar</button>
    </form>
	</div>

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Autor</th>
			<th>Editora</th>
			<th>Data de Lançamento</th>
			<th>Quantidade em Estoque</th>
			<th>Ação</th>
		</tr>
		<?php 
			include 'conexao.php';
			
			if (isset($_GET['search']) && isset($_GET['filter'])) {
                $search = $_GET['search'];
                $filter = $_GET['filter'];
                $sql = "SELECT * FROM livros WHERE $filter LIKE '%$search%' ORDER BY nome ASC";
            } else {
                // Consultar usuários sem critérios de pesquisa
                $sql = "SELECT * FROM livros ORDER BY nome ASC";
            }

			$result = mysqli_query($conn, $sql);
			
			
			// Executa a query e armazena o resultado
			$result = $conn->query($sql);

			// Loop para exibir cada registro na tabela
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["nome"]."</td>";
				echo "<td>".$row["autor"]."</td>";
				echo "<td>".$row["editora"]."</td>";
				echo "<td>" .formatarData($row["datalanc"]). "</td>";
				echo "<td>".$row["estoque"]."</td>";
				echo "<td><a href='editarlivros.php?id=".$row["id"]."' class='btn btn-warning'>Editar</a> | <a href='excluirlivro.php?id=".$row["id"]."' class='btn btn-danger'>Excluir</a></td>";
				echo "</tr>";

				
			}

			// Fecha a conexão com o banco de dados
			$conn->close();

			function formatarData($data) {
                return date("d/m/Y", strtotime($data));
                }
		?>
	</table>
	</div>
</body>
</html>

