<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Восстановление пароля | Селеста</title>
    <link rel="stylesheet" href="css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="auth-container">
        <a href="index.html"><- Вернуться назад</a>
        <h2>Восстановление пароля</h2>
        <p>Введите email, указанный при регистрации, и мы отправим вам ссылку для восстановления пароля</p>

        <form id="recovery-form">
            <div class="auth-input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="введите ваш email" required>
            </div>

            <button type="submit" class="auth-btn">Отправить ссылку</button>
        </form>

        <p class="auth-footer">Вспомнили пароль? <a href="auth.html">Войти</a></p>
    </div>

    <script>
        document.getElementById('recovery-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;

            // Временная реализация без бекенда
            alert('Ссылка для восстановления пароля отправлена на ' + email);

            // Очистка формы
            document.getElementById('email').value = '';
        });
    </script>
</body>
</html>