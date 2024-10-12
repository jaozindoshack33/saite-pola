<?php
require 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM notas WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $nota = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($nota['titulo']); ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($nota['titulo']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($nota['conteudo'])); ?></p>
        <small><?php echo htmlspecialchars($nota['data']); ?></small><br><br>
        <a href="visualizar_notas.php">Voltar para Notas de Autoajuda</a>
    </div>
</body>
</html>
