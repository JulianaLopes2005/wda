<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Logo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" href="usuarios.php">Usuários</a>
			  <a class="nav-link" href="livros.php">Livros</a>
			  <a class="nav-link" href="emprestimo.php">Empréstimos</a>
            </div>
          </div>
        </div>
      </nav>

      <center><h1>Lista de Livros</h1></center><br><br>
	<div class="container">
	<a href="cadastrolivros.php" type="button" class="btn btn-success">Adicionar Livros</a><br><br>
	<table class="table">
	<table class="table">
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
            
			// Query para selecionar todos os livros
			$sql = "SELECT * FROM livros";

			// Executa a query e armazena o resultado
			$result = $conn->query($sql);

			// Loop para exibir cada registro na tabela
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["nome"]."</td>";
				echo "<td>".$row["autor"]."</td>";
				echo "<td>".$row["editora"]."</td>";
				echo "<td>".$row["datalanc"]."</td>";
				echo "<td>".$row["estoque"]."</td>";
				echo "<td><a href='emprestar.php?id=".$row["id"]."' class='btn btn-info'>Emprestar</a></td>";
				echo "</tr>";
			}

			// Fecha a conexão com o banco de dados
			$conn->close();
		?>
	</table>
	</div>
</body>
</html>

