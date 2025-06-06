<?php
include('config.php');

if(!isset($_SESSION)){
   session_start();
 }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para buscar o usuário
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    

    if ($result->num_rows > 0) { //Verifica se o e-mail existe no BD

      if($senha == $row['senha']){// Verifica se a senha do formulário é igual a senha do BD
        $_SESSION['usuario_id'] = $row['id'];
        header("Location: exercicios.php");
        
      }else{
        echo 'senha errada';
      }
      
    }else{
      echo 'Não há email cadastrado';
    }
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