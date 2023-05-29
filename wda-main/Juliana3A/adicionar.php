<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit();
}
?>

<?php 
	include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Página do Administrador de Cadastro</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>Formulário</title>
    <style>
     

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6afff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
           
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

       
        .btn {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 4px;
            background-color: #ff81ff;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        

    </style>
</head>
<body><br><br><br><br>
    <div class="container">
		<center><h2>Cadastro de Usuário</h2></center>
        <form action="add.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return validateForm()">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" >
            	
            
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" >
            
            
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" class="form-control" >
            
            
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" class="form-control" >
            
            
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control">
            
            <br><br>
            <input type="submit" name="btn" value="Cadastrar" class="btn">
            <script>
            $(document).ready(function() {
                    $('#cpf').mask('000.000.000-00');
                });
            </script>
            <script>
            $(document).ready(function() {
                    $('#celular').mask('(00) 00000-0000');
                });
            </script>
        </form>
        
		<script>
            function formatar(mascara, documento) {
                var i = documento.value.length;
                var saida = '#';
                var texto = mascara.substring(i);
                while (texto.substring(0, 1) != saida && texto.length) {
                    documento.value += texto.substring(0, 1);
                    i++;
                    texto = mascara.substring(i);
                }
            }
        </script>
    </div>
</body>
</html>