<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="interface">
        <h2>Bem-vindo ao Sistema</h2>

        <p>Escolha uma das opções abaixo:</p>
        <div>
            <a href="login.php">
                <button>Login</button>
            </a>
        </div>
        <div>
            <a href="registro.php">
                <button>Cadastrar-se</button>
            </a>
        </div>
    </div>
</body>
</html>
