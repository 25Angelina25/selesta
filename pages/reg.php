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
    <title>Регистрация | Селеста</title>
    <link rel="stylesheet" href="/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <a href="index.php"><- Вернуться назад</a>
        <h2>Создать аккаунт</h2>

        <?php if ($error): ?>
            <div class="alert error" style="color: red; margin-bottom: 1rem;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert success" style="color: green; margin-bottom: 1rem;"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form id="register-form" method="POST" action="app/do_registr.php">
            <div class="input-group">
                <label for="username">Логин</label>
                <input type="text" id="username" name="login" placeholder="логин" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="почта" required>
            </div>
            <div class="input-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" placeholder="пароль" required>
            </div>
            <div class="input-group">
                <label for="phone">Телефон</label>
                <input type="tel" id="phone" name="number" placeholder="+7 (___) ___-__-__" required>
            </div>
            <div class="input-group">
                <label for="birthdate">Дата рождения</label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <button type="submit" class="submit-btn">Зарегистрироваться</button>
        </form>
        <p class="form-footer">Есть аккаунт? <a href="auth.php">Войти</a></p>
    </div>
    <script>
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);

            let formattedValue = '+7 (';
            if (value.length > 1) {
                formattedValue += value.substring(1, 4) + ') ';
            }
            if (value.length >= 5) {
                formattedValue += value.substring(4, 7) + '-';
            }
            if (value.length >= 8) {
                formattedValue += value.substring(7, 9) + '-';
                if (value.length >= 10) {
                    formattedValue += value.substring(9, 11);
                }
            }

            e.target.value = formattedValue;
        });
    </script>
</body>
</html>