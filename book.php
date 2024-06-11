<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
header("Location: library.php");
exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
header("Location: library.php");
exit;
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="book.css">
        <link rel="stylesheet" href="media.css">
        <title><?= htmlspecialchars($book['title']) ?></title>
    </head>
    <body class="body">
        <div class="container">
            <h1 class="book-title"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="book-author"><strong>Автор:</strong> <?= htmlspecialchars($book['author']) ?></p>
            <p class="book-description"><?= htmlspecialchars($book['description']) ?></p>
            <a href="owner.php?id=<?= $book['user_id'] ?>" class="btn">Посмотреть данные хозяина</a>
            <a href="library.php" class="btn btn-secondary">Назад в библиотеку</a>
        </div>
    </body>
</html>