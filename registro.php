<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $email = $_POST["email"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExcpetion $e) {
        die ("Erro na conexão com o banco de dados: " . $e->getMessage( ));
    }

    $smmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)");
    $smmt->execute([$usuario, $senha, $email]);

    $_SESSION["usuario"] = $usuario;
    header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1> TELA DE CADASTRO </H1>
    <form method="post">
        <input type= "text" name="usuario" placeholder="nome de usuario" required><br>
        <input type= "password" name="senha" placeholder="senha" required><br>
        <input type= "email" name="email" placeholder="email" required><br>
        <input type= "submit" value= "Cadastrar">
    </form>
</body>
</html>