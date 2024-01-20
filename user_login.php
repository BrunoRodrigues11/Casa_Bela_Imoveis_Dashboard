<?php
session_start();
include("connection/connection.php");
include("script/password.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$query = mysqli_query($conn, $sql);

// Buscando a senha criptografada no banco de dados
$dados = mysqli_fetch_assoc($query);
$senhabd = $dados['senha'];

// Criptografando a senha digitada pelo usuário
$senhaVerificada = md5($senha);

// Verifica se existe o usuário no banco de dados
$row = mysqli_affected_rows($conn);
if ($row == 1) {
    // Verifica se a senha digitada é igual a senha criptografada no banco de dados
    if ($senhabd == $senhaVerificada) {
        // Cria uma sessão para armazenar o usuário
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
    } else {
        header("Location: login.php?id=1");
    }
    // header("Location: index.php");
} else {
    header("Location: login.php?id=2");
}

?>