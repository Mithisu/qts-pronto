<?php
session_start();
include('config.php');

// Busca o último usuário cadastrado
$query = "SELECT nome, email, senha FROM usuario ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Nenhum usuário encontrado.";
    exit();
}

$senha_plana = isset($_SESSION['senha_plana']) ? $_SESSION['senha_plana'] : '';
unset($_SESSION['senha_plana']);
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado do Cadastro</title>
  <link rel="stylesheet" href="result.css">
</head>
<body>

<div class="container">
  <h2>Usuário Cadastrado com Sucesso</h2>
  <div class="info">
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
    <p><strong>Senha (original):</strong> <?php echo htmlspecialchars($senha_plana); ?></p>
    <p><strong>Senha (hash):</strong> <?php echo htmlspecialchars($usuario['senha']); ?></p>
  </div>
  <a href="registro.php" class="btn">Voltar</a>
</div>

</body>
</html>
