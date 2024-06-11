<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
header('Location: login.php');
exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare('INSERT INTO books (title, author, description, user_id) VALUES (?, ?, ?, ?)');
if ($stmt->execute([$title, $author, $description, $user_id])) {
header('Location: library.php');
exit;
} else {
$error = 'Ошибка при добавлении книги';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Добавить книгу</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="media.css">
</head>
<body class="body">
        <div class="container">
            <h1 class="title">Добавить книгу</h1>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <form method="post" class="form">
                <label for="title" class="label">Название:</label>
                <input type="text" name="title" id="title" class="input" required>
                <label for="author" class="label">Автор:</label>
                <input type="text" name="author" id="author" class="input" required>
                <label for="description" class="label">Описание :</label>
                <input type="text" name="description" id="description" class="input" required>
                <button type="submit" class="btn">Добавить</button>
            </form>
        </div>
    </body>
</html>