<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}


$stmt = $pdo->query('SELECT books.id, books.title, books.author, users.username FROM books JOIN users ON books.user_id = users.id');
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Библиотека</title>
        <link rel="stylesheet" href="test.css">
    </head>
    <body class="body">
        <header class="header">
            <a href = "index.php">выйти</a>
        </header>
        <h1 class="title">Библиотека</h1>
        <a href="add_book.php" class="btn">Добавить книгу</a>
        <ul class="book-list">
        <?php foreach ($books as $book): ?>
            <div class="book-item">
                <div class="book__info">
                    <span class="book-title"><?php echo htmlspecialchars($book['title']); ?></span> 
                    <span class="book-author"><?php echo htmlspecialchars($book['author']); ?></span>
                </div>
                <div class="btns">
                    <a href="book.php?id=<?php echo $book['id']; ?>" class="btn-small">Посмотреть книгу</a>
                    <a href="owner.php?id=<?= $book['user_id'] ?>" class="btn-small">Посмотреть данные хозяина</a>
                </div>
            </div>
        <?php endforeach; ?>
        </ul>
    </body>
</html>