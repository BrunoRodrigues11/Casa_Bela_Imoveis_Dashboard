<?php
include("connection/connection.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$query = mysqli_query($conn, $sql);

$dados = mysqli_fetch_assoc($query);
$senhabd = $dados['senha'];

// Verifica se existe o usuário no banco de dados
$row = mysqli_affected_rows($conn);
if ($row == 1) {
    header("Location: index.php");
} else {
    echo "Não existe esse usuário no banco de dados";
}

?>