<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$email = $_POST['email'];
$phone = $_POST['phone'];

$stmt = $pdo->prepare('INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)');
if ($stmt->execute([$username, $password, $email, $phone])) {
header('Location: login.php');
exit;
} else {
$error = 'Ошибка при регистрации';
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="media.css">
    </head>
    <body class="body">
        <div class="container">
        <h1 class="title">Регистрация</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" class="form">
        <label for="username" class="label">Имя пользователя:</label>
        <input type="text" name="username" id="username" class="input" required>
        <label for="password" class="label">Пароль:</label>
        <input type="password" name="password" id="password" class="input" required>
        <label for="email" class="label">Электронная почта:</label>
        <input type="email" name="email" id="email" class="input" required>
        <label for="phone" class="label">Телефон:</label>
        <input type="text" name="phone" id="phone" class="input" required>
        <button type="submit" class="btn">Зарегистрироваться</button>
        </form>
        </div>
    </body>
</html>