<?php 
 
include_once 'conexao.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$autor	= isset($_POST['autor']) == true ?$_POST['autor']:"";
	$editora  = isset($_POST['editora']) == true ?$_POST['editora']:"";
    $datalanc  = isset($_POST['datalanc']) == true ?$_POST['datalanc']:"";
    $estoque  = isset($_POST['estoque']) == true ?$_POST['estoque']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO livros (nome, autor, editora, datalanc, estoque) VALUES ('$nome', '$autor', '$editora', '$datalanc', '$estoque')";

		if ($conn->query($sql) == TRUE) {

			header('Location: livros.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>