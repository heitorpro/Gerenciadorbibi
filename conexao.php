<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'gerenciamento_bibi';

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = new mysqli($host, $usuario, $senha, $banco);
    $conn->set_charset("utf8");
} catch (mysqli_sql_exception $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
