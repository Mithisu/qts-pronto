<?php
include('config.php');

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Prepara a consulta com prepared statement
    $stmt = $conn->prepare("SELECT id, senha FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica a senha com password_verify
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario_id'] = $row['id'];
            header("Location: result.php");
            exit();
        } else {
            echo 'Senha incorreta.';
        }
    } else {
        echo 'Email não encontrado.';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="interface">
    <h2>Login</h2>

    <form action="login.php" method="POST">
    <div class="input-group">
        <input type="email" name="email" id="email" placeholder="email" required>
      </div>  
      <div class="input-group">
        <input type="password" name="senha" id="senha" placeholder="Senha" required>
      </div>
      <button type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta? <a href="registro.php">Faça seu cadastro aqui</a></p>
  </div>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('erro')) {
      document.getElementById('erro').style.display = 'block';
    }
  </script>
</body>
</html>