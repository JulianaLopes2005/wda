<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos</title>
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
			  <a class="nav-link" href="editora.php">Editoras</a>
			  <a class="nav-link" href="atrasos.php">Atrasos</a>
            </div>
          </div>
        </div>
      </nav>

<div class="container">

<center><h1>Lista de Empréstimos</h1></center>
<a href="pesquisaemp.php" type="button" class="btn btn-success">Pesquisar empréstimos</a><br><br>
      <table class= "table">
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
			// Consultar usuários
			$sql = "SELECT * FROM emprestimos";
			$result = mysqli_query($conn, $sql);
			// Exibir resultados
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






