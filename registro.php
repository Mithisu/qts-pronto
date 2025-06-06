<?php
include('config.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Validação de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "O email fornecido não é válido. Por favor, insira um email correto.";
        exit(); // Interrompe a execução do script se o email for inválido
    }

    // Inserção no banco de dados
    $result = mysqli_query($conn, "INSERT INTO usuario(email, nome, senha) VALUES('$email', '$nome', '$senha')");
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Cadastro</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  <div class="registro">
    <h2>Cadastro</h2>

    <form method="POST" action="registro.php">
      <div class="input-group">
        <input type="email" name="email" id="email" placeholder="email" required>
      </div>
      <div class="input-group">
        <input type="text" name="nome" id="nome" placeholder="nome" required>
      </div>
      <div class="input-group">
        <input type="password" name="senha" id="senha" placeholder="senha" required>
      </div>
      <button type="submit" name="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
  </div>
</body>
</html>
