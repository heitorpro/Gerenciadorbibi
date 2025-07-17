<?php


if (!isset($_GET['tipo'], $_GET['id'])) {
    echo "<div class='alert alert-danger'>Parâmetros inválidos.</div>";
    exit;
}

$tipo = $_GET['tipo']; // 'livro' ou 'revista'
$id = intval($_GET['id']);
$erro = '';
$sucesso = '';

// Buscar dados atuais
if ($tipo === 'livro') {
    $sql = "SELECT * FROM livros WHERE id_livro = $id LIMIT 1";
} elseif ($tipo === 'revista') {
    $sql = "SELECT * FROM revistas WHERE id_revista = $id LIMIT 1";
} else {
    echo "<div class='alert alert-danger'>Tipo inválido.</div>";
    exit;
}

$result = $conn->query($sql);
if ($result->num_rows === 0) {
    echo "<div class='alert alert-danger'>Registro não encontrado.</div>";
    exit;
}

$registro = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($tipo === 'livro') {
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $autor = $conn->real_escape_string($_POST['autor']);
        $editora = $conn->real_escape_string($_POST['editora']);
        $ano = intval($_POST['ano']);

        $sqlUpdate = "UPDATE livros SET titulo='$titulo', autor='$autor', editora='$editora', ano_publicacao=$ano WHERE id_livro=$id";

    } else {
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $volume = $conn->real_escape_string($_POST['volume']);
        $numero = $conn->real_escape_string($_POST['numero']);
        $editora = $conn->real_escape_string($_POST['editora']);
        $ano = intval($_POST['ano']);

        $sqlUpdate = "UPDATE revistas SET titulo='$titulo', volume='$volume', numero='$numero', editora='$editora', ano_publicacao=$ano WHERE id_revista=$id";
    }

    if ($conn->query($sqlUpdate) === TRUE) {
        $sucesso = "Registro atualizado com sucesso!";
        
        $result = $conn->query($sql);
        $registro = $result->fetch_assoc();
    } else {
        $erro = "Erro ao atualizar: " . $conn->error;
    }
}
?>

<h2>Editar <?= ucfirst($tipo) ?></h2>

<?php if ($sucesso): ?>
    <div class="alert alert-success"><?= $sucesso ?></div>
<?php endif; ?>
<?php if ($erro): ?>
    <div class="alert alert-danger"><?= $erro ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($registro['titulo']) ?>" required>
    </div>

    <?php if ($tipo === 'livro'): ?>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" value="<?= htmlspecialchars($registro['autor']) ?>" required>
        </div>
    <?php else: ?>
        <div class="mb-3">
            <label for="volume" class="form-label">Volume</label>
            <input type="text" class="form-control" id="volume" name="volume" value="<?= htmlspecialchars($registro['volume']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= htmlspecialchars($registro['numero']) ?>" required>
        </div>
    <?php endif; ?>

    <div class="mb-3">
        <label for="editora" class="form-label">Editora</label>
        <input type="text" class="form-control" id="editora" name="editora" value="<?= htmlspecialchars($registro['editora']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="ano" class="form-label">Ano de Publicação</label>
        <input type="number" min="1000" max="<?= date('Y') ?>" class="form-control" id="ano" name="ano" value="<?= htmlspecialchars($registro['ano_publicacao']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
