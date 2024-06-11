<?php
session_start();
require 'db.php';

if (!isset($_GET['id'])) {
header("Location: library.php");
exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
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
        <title>Хозаин книги</title>
    </head>
    <body class="body">
        <div class="container user">
            <h1 class="owner-title">Хозяин книги</h1>
            <p class="info"><strong class="owner-info">Имя:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p class="info"><strong class="owner-info">Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p class="info"><strong class="owner-info">Телефон:</strong> <?= htmlspecialchars($user['phone']) ?></p>
            <a href="library.php" class="btn btn-secondary">Назад в библиотеку</a>
        </div>
    </body>
</html>