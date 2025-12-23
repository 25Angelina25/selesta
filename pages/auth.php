<?php
session_start();

// Проверяем, есть ли сообщения об ошибках
$error = $_SESSION['alert']['error'] ?? null;
$success = $_SESSION['alert']['success'] ?? null;

// Очищаем сообщения после показа
unset($_SESSION['alert']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход | Селеста</title>
    <link rel="stylesheet" href="css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <a href="index.php"><- Вернуться назад</a>
        <h2>Вход в аккаунт</h2>

        <?php if ($error): ?>
            <div class="alert error" style="color: red; margin-bottom: 1rem;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert success" style="color: green; margin-bottom: 1rem;"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form id="login-form" method="POST" action="app/do_auto.php">
            <div class="auth-input-group">
                <label for="login">Логин</label>
                <input type="text" id="login" name="login" placeholder="логин" required>
            </div>
            
            <div class="auth-input-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" placeholder="пароль" required>
            </div>
            
            <button type="submit" class="auth-btn">Войти</button>
        </form>
        
        <p class="auth-footer">Нет аккаунта? <a href="reg.php">Зарегистрироваться</a></p>
        <p class="auth-footer"><a href="recovery.php">Забыли пароль?</a></p>
    </div>
</body>
</html>