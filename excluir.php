<?php

if (!isset($_GET['tipo'], $_GET['id'])) {
    echo "<div class='alert alert-danger'>Parâmetros inválidos.</div>";
    exit;
}

$tipo = $_GET['tipo']; // 'livro' ou 'revista'
$id = intval($_GET['id']);

if ($tipo === 'livro') {
    $sql = "DELETE FROM livros WHERE id_livro = $id";
} elseif ($tipo === 'revista') {
    $sql = "DELETE FROM revistas WHERE id_revista = $id";
} else {
    echo "<div class='alert alert-danger'>Tipo inválido.</div>";
    exit;
}

if ($conn->query($sql) === TRUE) {
    header('Location: index.php?pagina=listar&msg=excluido');
    exit;
} else {
    echo "<div class='alert alert-danger'>Erro ao excluir: " . $conn->error . "</div>";
}
