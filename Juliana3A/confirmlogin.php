<?php
// Verifica as credenciais do usuário
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar se o usuário e senha são válidos no banco de dados

if ($username === 'admin' && $password === 'master1234') {
    // Autenticação bem-sucedida
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    
    // Redireciona para a página principal após o login
    header('Location: usuarios.php');
    exit();
} else {
    // Autenticação falhou
    echo 'Usuário ou senha inválidos.';
}
?>