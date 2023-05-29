<!DOCTYPE html>
<html>
<head>
  	<link rel="stylesheet" href="css/bootstrap.min.css">
	  <script src="js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <title>Pesquisa de Editora</title>


    <style>
		.container{
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6afff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

		}
		.navbar-brand{
			font-style: italic;
			color: #ff98cd;
		}
		.nav-link{
			color: #ffffff;
		}

        input[type="submit"]{
            padding: 10px 15px;
            background-color: #ff81ff;
            color: #fff;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
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
			  <a class="nav-link" href="logout.php">Sair</a>
            </div>
          </div>
        </div>
      </nav>
	  <br><br>
     
      <div class="container">
        <center>
    <h2>Pesquisa de Editoras</h2>
    <br> 
    <form method="GET" action="">
        <input type="text" name="nome" placeholder="Digite o nome da editora"><br><br>
        <input type="submit" value="Pesquisar">
    </form>
    </div>
    </center><br>
    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obtém o nome digitado no formulário
        @$nome = $_GET['nome'];

        include 'conexao.php';

        // Constrói a consulta SQL
        $query = "SELECT * FROM editora WHERE nome_editora LIKE '%$nome%'";

        // Executa a consulta
        $result = mysqli_query($conn, $query);

        // Verifica se a consulta retornou resultados
        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Site</th>
                    </tr>";

            // Exibe os resultados
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row['nome_editora'] . "</td>
                        <td>" . $row['email_editora'] . "</td>
                        <td>" . $row['telefone'] . "</td>
                        <td>" . $row['site_editora'] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhuma editora encontrada.";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
    }
    ?>
    </div>
    
</body>
</html>