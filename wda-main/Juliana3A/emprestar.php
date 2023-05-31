<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Empréstimo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>

        .loan-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6afff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .loan-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-style: italic;
        }

        .loan-container label {
            font-style: italic;
        }

        .loan-container select,
        .loan-container input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .loan-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ff81ff;
            color: #fff;
            border: none;
            border-radius: 4px;
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


    <?php
        include 'conexao.php';

            // Consulta SQL para buscar os livros
        $livros_query = "SELECT id, nome FROM livros";
        $livros_result = mysqli_query($conn, $livros_query);

        // Consulta SQL para buscar os usuários
        $usuarios_query = "SELECT id, nome FROM usuarios";
        $usuarios_result = mysqli_query($conn, $usuarios_query);

        ?> 
        <br><br><br><br>
    <div class="loan-container">
        <h2>Empréstimo</h2>
        <form id="loan-form" action="efetuaremp.php" method="POST">
            <label for="livro">Livro:</label>
            <select id="livro" name="livro">
                <?php while ($livro = mysqli_fetch_assoc($livros_result)) : ?>
                    <option value="<?php echo $livro['id']; ?>"><?php echo $livro['nome']; ?></option>
                <?php endwhile; ?>
            </select>
            <br><br>
            <label for="usuario">Usuário:</label>
            <select id="usuario" name="usuario">
                <?php while ($usuario = mysqli_fetch_assoc($usuarios_result)) : ?>
                    <option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nome']; ?></option>
                <?php endwhile; ?>
            </select>
            <br><br>
            <label for="prazo">Prazo:</label>
            <input type="date" id="prazo" name="prazo" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
            <br><br>
            <input type="submit" value="Realizar Empréstimo">
        </form>
    </div>

    <?php
    // Fechar as consultas e a conexão com o banco de dados
    mysqli_free_result($livros_result);
    mysqli_free_result($usuarios_result);
    mysqli_close($conn);
    ?>
</body>
</html>
