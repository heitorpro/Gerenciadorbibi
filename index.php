<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Gerenciamento da Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .flex-grow-1 {
            flex-grow: 1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Biblioteca</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php?pagina=listar">Listar</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?pagina=cadastrar">Cadastrar</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4 flex-grow-1">
  <?php
    $pagina = $_GET['pagina'] ?? 'listar';
    $paginas_permitidas = ['listar', 'cadastrar', 'editar', 'excluir'];

    if (in_array($pagina, $paginas_permitidas)) {
        include $pagina . '.php';
    } else {
        echo "<div class='alert alert-danger'>Página não encontrada!</div>";
    }
  ?>
</div>

<footer class="bg-dark text-white text-center py-3 mt-auto">
  <p class="mb-0">&copy; <?= date('Y') ?> Biblioteca - Sistema de Gerenciamento</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
