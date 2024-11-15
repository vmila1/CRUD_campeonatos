<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Campeonatos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <h1>Campeonatos Cadastrados</h1>
        <p>Aqui você pode visualizar, editar e excluir campeonatos.</p>
    </header>

    <div class="buttons">
        <a href="criar_campeonato.php" class="button">Criar Novo Campeonato</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data de Início</th>
            <th>Data de Fim</th>
            <th>Ações</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM campeonatos");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['data_inicio']}</td>
                    <td>{$row['data_fim']}</td>
                    <td>
                        <a href='editar_campeonato.php?id={$row['id']}'>Editar</a> |
                        <a href='deletar_campeonato.php?id={$row['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
