<?php
include('config.php');
include('protect.php');

$msg = '';

// Selecionar os exercícios do usuário logado
if (isset($_SESSION['usuario_id'])) {
    $sql = "SELECT * FROM exercicios WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['usuario_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $exercicios = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    $exercicios = [];
    $msg = 'Erro: Usuário não está logado!';
}

if (isset($_GET['delete'])) { // Deletar exercício
    if (!isset($_SESSION['usuario_id'])) {
        $msg = 'Erro: Usuário não está logado!';
    } else {
        $id = $_GET['delete'];
        $usuario_id = $_SESSION['usuario_id']; 

        $sql = "DELETE FROM exercicios WHERE id = ? AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id, $usuario_id);
        if ($stmt->execute()) {
            $msg = 'Exercício excluído com sucesso!';
        } else {
            $msg = 'Erro ao excluir exercício!';
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sttle3.css">
    <title>Visualizar Exercícios</title>
    <script>
        function confirmDelete(id) {
            if (confirm("Você tem certeza que deseja excluir este exercício?")) {
                window.location.href = "criar.php?delete=" + id;
            }
        }
    </script>
</head>
<body>
    <h1>Lista de Exercícios</h1>

    <?php if ($msg): ?>
        <p style="color: green;"><?php echo $msg; ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($exercicios as $exercicio): ?>
            <tr>
                <td><?php echo htmlspecialchars($exercicio['nome_ex']); ?></td>
                <td><?php echo htmlspecialchars($exercicio['descricao']); ?></td>
                <td>
                    <?php
                    $tipo_id = $exercicio['tipo_id'];
                    $sql = "SELECT nome FROM tipo WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $tipo_id);
                    $stmt->execute();
                    $tipo_result = $stmt->get_result();
                    $tipo = $tipo_result->fetch_assoc();
                    echo htmlspecialchars($tipo['nome']);
                    $stmt->close();
                    ?>
                </td>
                <td>
                    <a href="criar.php?edit=<?php echo $exercicio['id']; ?>">Editar</a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $exercicio['id']; ?>)">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="logout.php">Sair</a></p>

    <!-- Botão para adicionar novo exercício -->
    <p><a href="criar.php"><button>Adicionar Novo Exercício</button></a></p>
</body>
</html>
