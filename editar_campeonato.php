<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Protege contra SQL Injection
    $result = $conn->query("SELECT * FROM campeonatos WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Campeonato não encontrado!'); window.location.href='visualizar_campeonatos.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID inválido!'); window.location.href='visualizar_campeonatos.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $sql = "UPDATE campeonatos SET nome = '$nome', data_inicio = '$data_inicio', data_fim = '$data_fim' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Campeonato atualizado com sucesso!'); window.location.href='visualizar_campeonatos.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar campeonato: {$conn->error}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Campeonato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Editar Campeonato</h1>
        </header>

        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>

            <label for="data_inicio">Data de Início:</label>
            <input type="date" id="data_inicio" name="data_inicio" value="<?php echo $row['data_inicio']; ?>" required>

            <label for="data_fim">Data de Fim:</label>
            <input type="date" id="data_fim" name="data_fim" value="<?php echo $row['data_fim']; ?>" required>

            <button type="submit" class="submit-button">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
