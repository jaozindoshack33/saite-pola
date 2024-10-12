<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Nota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Nota de Autoajuda</h1>
        <form action="processa_nota.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>
            <label for="conteudo">Conteúdo:</label><br>
            <textarea id="conteudo" name="conteudo" rows="10" cols="30" required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>
        <a href="index.php">Voltar para a Página Inicial</a>
    </div>
</body>
</html>
