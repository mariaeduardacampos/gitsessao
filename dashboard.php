<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

echo "Bem-vindo, " . $_SESSION["usuario"] . "! Esta é  a página de dashboard.";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Dashboard</title>
</head>
<body>
<a href="logout.php"> Sair </a>
</body>
</html>