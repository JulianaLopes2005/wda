<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
   
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista de Atrasos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<?php
include_once('conexao.php');

// Consulta os empréstimos em atraso
$query_emprestimos = "SELECT * FROM emprestimos WHERE prazo_entrega < CURDATE()";
$resultado_emprestimos = mysqli_query($conn, $query_emprestimos);

// Verifica se foram encontrados empréstimos em atraso
if(mysqli_num_rows($resultado_emprestimos) > 0) {
    echo "<div class='container'><center><h1>Empréstimos em atraso:</h1></center><br><br>";
    echo "<table class='table table-striped'>";
    echo "<tr><th>ID</th><th>Livro</th><th>Usuário</th><th>Data de Empréstimo</th><th>Prazo de Entrega</th></tr>";

    // Exibe os dados dos empréstimos em atraso
    while($row = mysqli_fetch_assoc($resultado_emprestimos)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['livro_nome']."</td>";
        echo "<td>".$row['usuario_nome']."</td>";
        echo "<td>".$row['data_emprestimo']."</td>";
        echo "<td>".$row['prazo_entrega']."</td>";
        echo "<td><a href='devolucaolivro.php?id=".$row["id"]."'class='btn btn-info'>Devolução</a></td>";
        echo "</tr>";
    }

    echo "</table></div>";
} else {
    echo "<div class='container'><center><p>Nenhum empréstimo em atraso encontrado.</p></center></div>";
}
?>