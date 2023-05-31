<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
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
    <title>Usuarios</title>
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
			width: 20%;
			height: 0%;
			position: right;
			

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
<center><h1>Lista de Usuários</h1></center>
	  <br>
	  <a href="adicionar.php" type="button" class="btn btn-success">Adicionar Usuário</a> -
	  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
	  <table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Endereço</th>
			<th>CPF</th>
			<th></th>
		</tr>
		<?php
			include 'conexao.php'; 
			// Consultar usuários
			$sql = "SELECT * FROM usuarios";
			$result = mysqli_query($conn, $sql);
			// Exibir resultados
			//Se tiver mais de um registro
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["nome"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "<td>".$row["celular"]."</td>";
					echo "<td>".$row["endereco"]."</td>";
					echo "<td>".$row["cpf"]."</td>";

					echo "<td><a href='editar.php?id=".$row["id"]."' class='btn btn-warning'>Editar</a> | <a href='excluir.php?id=".$row["id"]."' class='btn btn-danger'>Excluir</a></td>";
					echo "</tr>";
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

