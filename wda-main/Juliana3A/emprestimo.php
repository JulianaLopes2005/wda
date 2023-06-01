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
    <title>Empréstimos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.bundle.min.js"></script>

	<style>
		.table-striped{
			background: #E6E6FA;
		}

		.navbar-brand{
			font-style: italic;
			color: #ff98cd;
		}

		.nav-link{
			color: #ffffff;
		}

		.d-flex{
			width: 25%;
			height: 2rem;
			float: right;
		}

		.btn-bg{
			padding: 10px 20px;
            font-size: 12px;
            border-radius: 4px;
            background-color: #ff81ff;
            color: #ffffff;
            border: none;
            cursor: pointer;
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
<div class="container">

<center><h1>Lista de Empréstimos</h1></center>
<a href="emprestar.php" type="button" class="btn btn-success">Efetuar empréstimos</a><br><br>
<div class="pesquisa">
    <form class="d-flex" method="GET">
	<input class="form-control me-2" type="search" name="search" placeholder="pesquisar..." aria-label="search">
	 	  <select name="filter">
				<option value="id">ID</option>
				<option value="livro_id">Livro ID</option>
				<option value="livro_nome">Nome do Livro</option>
				<option value="usuario_id">ID do Usuário</option>
				<option value="usuario_nome">Nome do Usuário</option>
		  </select>
	<button class="btn-bg" type="submit">Pesquisar</button>
    </form>
	</div>



      <table class= "table table-striped">
		<tr>
			<th>ID</th>
			<th>Livro ID</th>
			<th>Nome do Livro</th>
			<th>ID do Usuário</th>
			<th>Nome do Usuário</th>
			<th>Prazo de Entrega</th>
			<th></th>
		</tr>
		<?php
			include 'conexao.php'; 
			if (isset($_GET['search']) && isset($_GET['filter'])) {
                $search = $_GET['search'];
                $filter = $_GET['filter'];
                $sql = "SELECT * FROM emprestimos WHERE $filter LIKE '%$search%' ORDER BY nome ASC";
            } else {
                // Consultar usuários sem critérios de pesquisa
                $sql = "SELECT * FROM emprestimos ORDER BY nome ASC";
            }

			$result = mysqli_query($conn, $sql);
			
			//Se tiver mais de um registro
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["livro_id"]."</td>";
					echo "<td>".$row["livro_nome"]."</td>";
					echo "<td>".$row["usuario_id"]."</td>";
					echo "<td>".$row["usuario_nome"]."</td>";
					echo "<td>".$row["prazo_entrega"]."</td>";
					echo "<td><a href='devolucaolivro.php?id=".$row["id"]."' class='btn btn-info'>Devolução</a></td>";
					echo "</tr>";


				}
			} else {
				echo "<tr><td colspan='4'>Nenhum emprestimo encontrado.</td></tr>";
			}
			// Fechar conexão
			mysqli_close($conn);
		?>
	</table>
	</div>
	</div>		
</body>
</html>






