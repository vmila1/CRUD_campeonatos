<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campeonatos Cadastrados</title>
    <link rel="stylesheet" href="style.css?v=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <header class="header">
        <img src="imagens/logo.png" alt="Logo GameChamps" class="logo_menor">
        <h1>Campeonatos Cadastrados</h1>
        <p>Aqui você pode visualizar, editar e excluir campeonatos.</p>
    </header>

    <div class="buttons">
        <a href="criar_campeonato.php" class="button">Criar Novo Campeonato</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM campeonatos");

                if ($result && $result->num_rows > 0) {
                    // Itera sobre os campeonatos retornados
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['data_inicio']}</td>
                                <td>{$row['data_fim']}</td>
                                <td>
                                    <a href='editar_campeonato.php?id={$row['id']}' class='action-link'>
                                        <i class='fas fa-edit'></i> Editar
                                    </a>
                                    |
                                    <a href='deletar_campeonato.php?id={$row['id']}' class='action-link delete'>
                                        <i class='fas fa-trash'></i> Excluir
                                    </a>
                                </td>
                            </tr>";
                    }
                } else {
                    // Caso nenhum campeonato esteja cadastrado
                    echo "<tr>
                            <td colspan='5' style='text-align: center;'>Nenhum campeonato cadastrado.</td>
                          </tr>";
                }

                // Verificação de erros na conexão ou query
                if (!$result) {
                    echo "<tr>
                            <td colspan='5' style='text-align: center; color: red;'>
                                Erro ao buscar campeonatos: " . $conn->error . "
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
