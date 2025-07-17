<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';

    if ($tipo === 'livro') {
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $autor = $conn->real_escape_string($_POST['autor']);
        $editora = $conn->real_escape_string($_POST['editora']);
        $ano = $conn->real_escape_string($_POST['ano']);

        $sql = "INSERT INTO livros (titulo, autor, editora, ano_publicacao) VALUES ('$titulo', '$autor', '$editora', '$ano')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Livro cadastrado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro: " . $conn->error . "</div>";
        }

    } elseif ($tipo === 'revista') {
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $volume = $conn->real_escape_string($_POST['volume']);
        $numero = $conn->real_escape_string($_POST['numero']);
        $editora = $conn->real_escape_string($_POST['editora']);
        $ano = $conn->real_escape_string($_POST['ano']);

        $sql = "INSERT INTO revistas (titulo, volume, numero, editora, ano_publicacao) VALUES ('$titulo', '$volume', '$numero', '$editora', '$ano')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Revista cadastrada com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro: " . $conn->error . "</div>";
        }
    }
}
?>

<h2>Cadastrar Livro ou Revista</h2>

<form method="POST" class="mb-4">
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required onchange="mostrarCampos()">
            <option value="">Selecione</option>
            <option value="livro">Livro</option>
            <option value="revista">Revista</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <div id="campoAutor" class="mb-3" style="display:none;">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor">
    </div>

    <div id="campoVolume" class="mb-3" style="display:none;">
        <label for="volume" class="form-label">Volume</label>
        <input type="text" class="form-control" id="volume" name="volume">
    </div>

    <div id="campoNumero" class="mb-3" style="display:none;">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero">
    </div>

    <div class="mb-3">
        <label for="editora" class="form-label">Editora</label>
        <input type="text" class="form-control" id="editora" name="editora" required>
    </div>

    <div class="mb-3">
        <label for="ano" class="form-label">Ano de Publicação</label>
        <input type="number" min="1000" max="<?= date('Y') ?>" class="form-control" id="ano" name="ano" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
function mostrarCampos() {
    const tipo = document.getElementById('tipo').value;
    document.getElementById('campoAutor').style.display = (tipo === 'livro') ? 'block' : 'none';
    document.getElementById('campoVolume').style.display = (tipo === 'revista') ? 'block' : 'none';
    document.getElementById('campoNumero').style.display = (tipo === 'revista') ? 'block' : 'none';
}
</script>
