<?php
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
    <title>Селеста — цветы с достоинством</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/catalog.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="/css/contacts.css">    
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
                <img src="/assets/img/logo/logo2.png" alt="Логотип Селеста">
                <h1 class="shop-name">Селеста</h1>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="about">О нас</a></li>
                    <li><a href="#reviews">Отзывы</a></li>
                    <?php if (isset($_SESSION['uid'])): ?>
                        <li><a href="profile">Профиль</a></li>
                        <li><a href="app/logout.php">Выйти</a></li>
                    <?php else: ?>
                        <li><a href="auth">Войти</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>