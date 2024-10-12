<?php
require 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM notas ORDER BY data DESC");
    $notas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Notas de Autoajuda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Notas de Autoajuda</h1>
        <a href="adicionar_nota.php">Adicionar Nova Nota</a>
        <?php if (!empty($notas)): ?>
            <ul>
                <?php foreach ($notas as $nota): ?>
                    <li>
                        <h2><a href="ver_nota.php?id=<?php echo $nota['id']; ?>"><?php echo htmlspecialchars($nota['titulo']); ?></a></h2>
                        <p><?php echo nl2br(htmlspecialchars(substr($nota['conteudo'], 0, 100))); ?>...</p>
                        <small><?php echo htmlspecialchars($nota['data']); ?></small><br>
                        <a href="editar_nota.php?id=<?php echo $nota['id']; ?>">Editar</a> |
                        <a href="apagar_nota.php?id=<?php echo $nota['id']; ?>" onclick="return confirm('Tem certeza que deseja apagar esta nota?');">Apagar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhuma nota encontrada.</p>
        <?php endif; ?>
    </div>
</body>
</html>
