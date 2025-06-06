<?php
include('config.php');
include('protect.php');

$msg = '';

// Selecionar tipos de exercícios
$sql = "SELECT * FROM tipo";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tipos_result = $stmt->get_result();
$tipos = $tipos_result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

if (isset($_POST['add'])) { // Adicionar exercício
    if (!isset($_SESSION['usuario_id'])) {
        $msg = 'Erro: Usuário não está logado!';
    } else {
        $nome_ex = $_POST['nome_ex'];
        $descricao = $_POST['descricao'];
        $tipo_id = $_POST['tipo_id'];
        $usuario_id = $_SESSION['usuario_id'];

        $sql = "INSERT INTO exercicios (nome_ex, descricao, tipo_id, usuario_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $nome_ex, $descricao, $tipo_id, $usuario_id);
        if ($stmt->execute()) {
            $msg = 'Exercício adicionado com sucesso!';
        } else {
            $msg = 'Erro ao adicionar exercício!';
        }
        $stmt->close();
    }
}

$edit_exercicio = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    if (isset($_SESSION['usuario_id'])) {
        $sql = "SELECT * FROM exercicios WHERE id = ? AND usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id, $_SESSION['usuario_id']);
        $stmt->execute();
        $edit_exercicio = $stmt->get_result()->fetch_assoc();
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
    <title>Adicionar/Editar Exercício</title>
</head>
<body>
    <h1>Adicionar ou Editar Exercício</h1>

    <?php if ($msg): ?>
        <p style="color: green;"><?php echo $msg; ?></p>
    <?php endif; ?>

    <center>
        <form action="criar.php" method="POST">
            <input type="text" name="nome_ex" id="nome_ex" placeholder="Nome do Exercício" required 
                   value="<?php echo $edit_exercicio ? htmlspecialchars($edit_exercicio['nome_ex']) : ''; ?>">
            <textarea name="descricao" id="descricao" placeholder="Descrição do Exercício" required><?php echo $edit_exercicio ? htmlspecialchars($edit_exercicio['descricao']) : ''; ?></textarea>
            
            <select name="tipo_id" required>
                <option value="">Selecione o Tipo</option>
                <?php foreach ($tipos as $tipo): ?>
                    <option value="<?php echo $tipo['id']; ?>" <?php echo ($edit_exercicio && $edit_exercicio['tipo_id'] == $tipo['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($tipo['nome']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit" name="<?php echo $edit_exercicio ? 'edit' : 'add'; ?>">
                <?php echo $edit_exercicio ? 'Atualizar Exercício' : 'Adicionar Exercício'; ?>
            </button>
            
            <?php if ($edit_exercicio): ?>
                <input type="hidden" name="id" value="<?php echo $edit_exercicio['id']; ?>">
            <?php endif; ?>
        </form>
    </center>

    <!-- Botão para voltar à lista de exercícios -->
    <p><a href="exercicios.php"><button>Voltar para a Lista de Exercícios</button></a></p>

</body>
</html>
