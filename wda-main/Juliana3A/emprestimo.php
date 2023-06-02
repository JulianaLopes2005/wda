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
        .table-striped {
            background: #E6E6FA;
        }

        .d-flex {
            width: 28%;
            height: 2rem;
            margin: 5px;
		    
			
        }

        .btn-bg {
            font-size: 16px;
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

    <center><h1>Lista de Empréstimos</h1></center>
    <a href="emprestar.php" type="button" class="btn btn-success">Efetuar empréstimos</a><br><br>
    <div class="pesquisa">
        <form class="d-flex" method="GET">
            <input type="text" name="search" placeholder="Pesquisar...">
            <select name="filter">
                <option value="id">ID</option>
                <option value="livro_id">ID do Livro</option>
                <option value="livro_nome">Nome do Livro</option>
                <option value="usuario_id">ID do Usuário</option>
                <option value="usuario_nome">Nome do Usuário</option>
            </select>
            <select name="prazo_filter">
                <option value="">Todos</option>
                <option value="dentro">Dentro do Prazo</option>
                <option value="atrasado">Atrasados</option>
            </select>
            <button type="submit" class="btn-bg">Pesquisar</button>
        </form>


        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Livro ID</th>
                <th>Nome do Livro</th>
                <th>ID do Usuário</th>
                <th>Nome do Usuário</th>
                <th>Prazo de Entrega</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            <?php
            include 'conexao.php';
            $search = '';
            $filter = '';
            $prazoFilter = '';

            if (isset($_GET['search']) && isset($_GET['filter'])) {
                // Variáveis de pesquisa
                $search = $_GET['search'];
                $filter = $_GET['filter'];
            }

            if (isset($_GET['prazo_filter'])) {
                // Filtrar por prazo de entrega
                $prazoFilter = $_GET['prazo_filter'];
            }

            // Cláusula WHERE para o filtro de prazo
            $prazoWhere = '';
            if ($prazoFilter === 'dentro') {
                $prazoWhere = "prazo_entrega >= CURDATE()";
            } elseif ($prazoFilter === 'atrasado') {
                $prazoWhere = "prazo_entrega < CURDATE()";
            }

            // Cláusula WHERE para o filtro de variáveis de pesquisa
            $searchWhere = '';
            if (!empty($search) && !empty($filter)) {
                $searchWhere = "$filter LIKE '%$search%'";
            }

            // Construir a cláusula WHERE combinando os filtros de prazo e pesquisa
            $whereClause = '';
            if (!empty($prazoWhere) && !empty($searchWhere)) {
                $whereClause = "($prazoWhere) AND ($searchWhere)";
            } elseif (!empty($prazoWhere)) {
                $whereClause = $prazoWhere;
            } elseif (!empty($searchWhere)) {
                $whereClause = $searchWhere;
            }

            // Consultar empréstimos de acordo com o filtro selecionado
            $sql = "SELECT * FROM emprestimos";
            if (!empty($whereClause)) {
                $sql .= " WHERE $whereClause"; // Correção: WHERE em vez de AND
            }

            $sql .= " ORDER BY usuario_nome ASC";
            $result = mysqli_query($conn, $sql);

            // Se tiver mais de um registro
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["livro_id"] . "</td>";
                    echo "<td>" . $row["livro_nome"] . "</td>";
                    echo "<td>" . $row["usuario_id"] . "</td>";
                    echo "<td>" . $row["usuario_nome"] . "</td>";
                    echo "<td>" . formatarData($row["prazo_entrega"]) . "</td>";
                    $dataAtual = date('Y-m-d');
                    $prazoEntrega = $row["prazo_entrega"];
                    $status = "";

                    if ($prazoEntrega < $dataAtual) {
                        $status = "Atrasado";
                        echo "<td class='table-danger'>$status</td>";
                    } else {
                        $status = "Dentro do prazo";
                        echo "<td class='table-success'>$status</td>";
                    }
                    echo "<td><a href='devolucaolivro.php?id=" . $row["id"] . "' class='btn btn-info'>Devolução</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum empréstimo encontrado.</td></tr>";
            }
            // Fechar conexão
            mysqli_close($conn);

            function formatarData($data)
            {
                return date("d/m/Y", strtotime($data));
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
