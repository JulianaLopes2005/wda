<?php 
 
include_once 'conexao.php';

	$nome_editora 	= isset($_POST['nome_editora']) == true ?$_POST['nome_editora']:"";
	$email_editora	= isset($_POST['email_editora']) == true ?$_POST['email_editora']:"";
	$telefone  = isset($_POST['telefone']) == true ?$_POST['telefone']:"";
    $site_editora  = isset($_POST['site_editora']) == true ?$_POST['site_editora']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO editora (nome_editora, email_editora, telefone, site_editora) VALUES ('$nome_editora', '$email_editora', '$telefone', '$site_editora')";

		if ($conn->query($sql) == TRUE) {

			header('Location: editora.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>