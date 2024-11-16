<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM campeonatos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Campeonato excluído com sucesso!'); window.location.href='visualizar_campeonatos.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir campeonato: {$conn->error}'); window.location.href='visualizar_campeonatos.php';</script>";
    }
} else {
    echo "<script>alert('ID inválido!'); window.location.href='visualizar_campeonatos.php';</script>";
}
?>
