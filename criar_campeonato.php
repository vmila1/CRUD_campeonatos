<?php
include('config.php');

if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];

    $sql = "INSERT INTO campeonatos (nome, data_inicio, data_fim) VALUES ('$nome', '$data_inicio', '$data_fim')";
    if ($conn->query($sql) === TRUE) {
        echo "Novo campeonato adicionado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Campeonato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <header class="header">
            <img src="imagens/logo.png" alt="Logo GameChamps" class="logo_menor">
            <h1>GameChamps</h1>
            <p>Adicione um novo campeonato</p>
        </header>

        <div class="form-box">
            <form action="criar_campeonato.php" method="POST">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do Campeonato" required>
                </div>

                <div class="input-group">
                    <label for="data_inicio">Data de Início</label>
                    <input type="date" id="data_inicio" name="data_inicio" required>
                </div>

                <div class="input-group">
                    <label for="data_fim">Data de Fim</label>
                    <input type="date" id="data_fim" name="data_fim" required>
                </div>

                <button type="submit" name="adicionar" class="submit-button">Adicionar Campeonato</button>
            </form>
        </div>

        <div class="buttons">
            <a href="visualizar_campeonatos.php" class="view-button">Visualizar Campeonatos</a>
        </div>
    </div>
</body>
</html>
