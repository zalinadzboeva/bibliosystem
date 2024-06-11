<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
$_SESSION['user_id'] = $user['id'];
header('Location: library.php');
exit;
} else {
$error = 'Неправильное имя пользователя или пароль';
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="media.css">
    </head>
    <body class="body">
        <div class="container">
        <h1 class="title">Авторизация</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" class="form">
        <label for="username" class="label">Имя пользователя:</label>
        <input type="text" name="username" id="username" class="input" required>
        <label for="password" class="label">Пароль:</label>
        <input type="password" name="password" id="password" class="input" required>
        <button type="submit" class="btn">Войти</button>
        </form>
        <p><a href="register.php" class="link">Регистрация</a></p>
        </div>
    </body>
</html>