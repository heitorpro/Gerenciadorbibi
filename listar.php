<?php


// Mensagem de sucesso após exclusão
if (isset($_GET['msg']) && $_GET['msg'] === 'excluido') {
    echo "<div class='alert alert-success'>Registro excluído com sucesso!</div>";
}


$sqlLivros = "SELECT id_livro, titulo, autor, editora, ano_publicacao FROM livros";
$resultLivros = $conn->query($sqlLivros);


$sqlRevistas = "SELECT id_revista, titulo, volume, numero, editora, ano_publicacao FROM revistas";
$resultRevistas = $conn->query($sqlRevistas);
?>

<h2>Livros</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($resultLivros->num_rows > 0): ?>
            <?php while($livro = $resultLivros->fetch_assoc()): ?>
                <tr>
                    <td><?= $livro['id_livro'] ?></td>
                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                    <td><?= htmlspecialchars($livro['editora']) ?></td>
                    <td><?= $livro['ano_publicacao'] ?></td>
                    <td>
                        <a href="index.php?pagina=editar&tipo=livro&id=<?= $livro['id_livro'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?pagina=excluir&tipo=livro&id=<?= $livro['id_livro'] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Tem certeza que deseja excluir este livro?');">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Nenhum livro cadastrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<h2>Revistas</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Volume</th>
            <th>Número</th>
            <th>Editora</th>
            <th>Ano</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($resultRevistas->num_rows > 0): ?>
            <?php while($revista = $resultRevistas->fetch_assoc()): ?>
                <tr>
                    <td><?= $revista['id_revista'] ?></td>
                    <td><?= htmlspecialchars($revista['titulo']) ?></td>
                    <td><?= htmlspecialchars($revista['volume']) ?></td>
                    <td><?= htmlspecialchars($revista['numero']) ?></td>
                    <td><?= htmlspecialchars($revista['editora']) ?></td>
                    <td><?= $revista['ano_publicacao'] ?></td>
                    <td>
                        <a href="index.php?pagina=editar&tipo=revista&id=<?= $revista['id_revista'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="index.php?pagina=excluir&tipo=revista&id=<?= $revista['id_revista'] ?>" 
                           class="btn btn-sm btn-danger" 
                           onclick="return confirm('Tem certeza que deseja excluir esta revista?');">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">Nenhuma revista cadastrada.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
