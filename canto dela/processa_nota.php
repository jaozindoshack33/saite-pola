<?php
require 'config.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];

    $stmt = $pdo->prepare("INSERT INTO notas (titulo, conteudo) VALUES (:titulo, :conteudo)");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':conteudo', $conteudo);
    $stmt->execute();

    header('Location: visualizar_notas.php');
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
