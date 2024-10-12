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
    <title>Editar Nota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Nota</h1>
        <form action="processa_edicao.php" method="post">
            <input type="hidden" name="id" value="<?php echo $nota['id']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($nota['titulo']); ?>" required><br><br>
            <label for="conteudo">Conteúdo:</label><br>
            <textarea id="conteudo" name="conteudo" rows="10" cols="30" required><?php echo htmlspecialchars($nota['conteudo']); ?></textarea><br><br>
            <input type="submit" value="Salvar">
        </form>
        <a href="visualizar_notas.php">Voltar para Notas de Autoajuda</a>
    </div>
</body>
</html>
