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
<html>
<head>
    <title>Pesquisar Empréstimos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .pesquisaemp-container{
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6afff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
        }

        label {
            margin-bottom: 10px;
            position: left;
        }

        input[type="text"] {
            padding: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
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
            border-bottom: 1px solid #ff81ff;
        }

        th {
            background-color: #f2f2f2;
        }
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
			  <a class="nav-link" href="logout.php">Sair</a>
            </div>
          </div>
        </div>
      </nav>

	  <br><br>
    <div class="pesquisaemp-container">
    <center><h2>Pesquisar Empréstimos</h2></center>
    <form action="" method="GET">
        <label for="variavel">Pesquisar por:</label>
        <select name="variavel" id="variavel">
            <option value="usuario_nome">Usuário</option>
            <option value="cpf">CPF</option>
            <option value="livro_nome">Nome do Livro</option>
        </select>
        <br>
        <input type="text" name="valor" id="valor" required>

        <input type="submit" value="Pesquisar">
    </form><br>
    </div>
    <?php
    // Verifica se o formulário foi enviado
    if (isset($_GET['variavel']) && isset($_GET['valor'])) {
        $variavel = $_GET['variavel'];
        $valor = $_GET['valor'];

        // Realiza a conexão com o banco de dados
        include('conexao.php');

        // Monta a query SQL com base na variável selecionada
        if ($variavel === 'cpf') {
            $query_emprestimos = "SELECT * FROM emprestimos INNER JOIN usuarios ON emprestimos.usuario_id = usuarios.id WHERE usuarios.cpf = '$valor'";
        } else {
            $query_emprestimos = "SELECT * FROM emprestimos WHERE $variavel LIKE '%$valor%'";
        }

        $resultado_emprestimos = mysqli_query($conn, $query_emprestimos);

        // Verifica se foram encontrados empréstimos
        if (mysqli_num_rows($resultado_emprestimos) > 0) {
            echo "<div class='container'><br><br><center><h2>Empréstimos encontrados:</h2></center><br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Livro</th><th>Usuário</th><th>Data de Empréstimo</th></tr>";

            // Exibe os dados dos empréstimos encontrados
            while ($row = mysqli_fetch_assoc($resultado_emprestimos)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['livro_nome'] . "</td>";
                echo "<td>" . $row['usuario_nome'] . "</td>";
                echo "<td>" . $row['data_emprestimo'] . "</td>";
                echo "</tr>";
            }

            echo "</table></div>";
        } else {
            echo "<p>Nenhum empréstimo encontrado para a variável selecionada.</p>";
        }
    }
    ?>