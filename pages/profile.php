<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['uid'])) {
    header('Location: auth');
    exit;
}

// Подключаем boot.php из папки app (на уровень выше)
require_once __DIR__ . '/../app/boot.php';

// Получаем данные пользователя из базы
$stmt = pdo()->prepare("SELECT login, email, number, created_at FROM users WHERE id = ?");
$stmt->execute([$_SESSION['uid']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header('Location: auth');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет - Селеста</title>
    <link rel="stylesheet" href="../css/profile.css"> <!-- ✅ Путь к CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Шапка -->
        <header class="header">
            <div class="logo">
                <img src="../assets/img/logo/logo2.png" alt=""> <!-- ✅ Путь к изображению -->
                <h2>Селеста</h2>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <img src="../assets/img/logo/геля.jpg" alt="Аватар">
                </div>
                <div class="user-details">
                    <span class="user-name"><?= htmlspecialchars($user['login'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span class="profile-link">профиль</span>
                </div>
            </div>
        </header>

        <div class="main-content">
            <!-- Боковое меню -->
            <nav class="sidebar">
                <ul class="menu">
                    <li class="menu-item active">
                        <span class="menu-icon">👤</span>
                        <span class="menu-text">Мой аккаунт</span>
                    </li>
                    <li class="menu-item">
                        <span class="menu-icon">💳</span>
                        <span class="menu-text">Личный счет</span>
                    </li>
                    <li class="menu-item">
                        <span class="menu-icon">📦</span>
                        <span class="menu-text">История заказов</span>
                    </li>
                    <li class="menu-item">
                        <span class="menu-icon">🛒</span>
                        <span class="menu-text">Корзина</span>
                    </li>
                    <li class="menu-item logout">
                        <span class="menu-icon">🚪</span>
                        <span class="menu-text">Выход</span>
                    </li>
                </ul>
            </nav>

            <!-- Основная область профиля -->
            <main class="profile-content">
                <!-- Вкладка "Мой аккаунт" -->
                <div class="content-section active" id="account-section">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <img src="../assets/img/logo/геля.jpg" alt="Фото профиля">
                        </div>
                        <div class="profile-welcome">
                            <h1>Добро пожаловать, <?= htmlspecialchars($user['login'], ENT_QUOTES, 'UTF-8') ?></h1>
                            <button class="main-page-btn">Вернуться на главную</button>
                        </div>
                    </div>

                    <div class="profile-info">
                        <div class="info-card">
                            <div class="info-row">
                                <label>Номер телефона</label>
                                <div class="info-value">
                                    <span id="phone"><?= htmlspecialchars($user['number'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <button class="edit-btn" data-field="phone">✏️</button>
                                </div>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-row">
                                <label>E-mail</label>
                                <div class="info-value">
                                    <span id="email"><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <button class="edit-btn" data-field="email">✏️</button>
                                </div>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-row">
                                <label>Логин</label>
                                <div class="info-value">
                                    <span id="username"><?= htmlspecialchars($user['login'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <button class="edit-btn" data-field="username">✏️</button>
                                </div>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-row">
                                <label>Дата регистрации</label>
                                <div class="info-value">
                                    <span id="created_at"><?= date('d.m.Y', strtotime($user['created_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Вкладка "Личный счет" -->
                <div class="content-section" id="balance-section">
                    <div class="section-header">
                        <h2>Личный счет</h2>
                    </div>
                    <div class="balance-info">
                        <div class="balance-card">
                            <div class="balance-amount">
                                <h3>Текущий баланс</h3>
                                <p class="amount" id="balance-amount">0 ₽</p>
                            </div>
                            <div class="balance-actions">
                                <button class="action-btn top-up">Пополнить</button>
                                <button class="action-btn history">История операций</button>
                            </div>
                        </div>
                        <div class="recent-operations">
                            <h3>Последние операции</h3>
                            <div class="operations-list" id="operations-list">
                                <!-- Операции будут загружаться с сервера -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Вкладка "История заказов" -->
                <div class="content-section" id="orders-section">
                    <div class="section-header">
                        <h2>История заказов</h2>
                    </div>
                    <div class="orders-container" id="orders-container">
                        <!-- Заказы будут загружаться с сервера -->
                    </div>
                </div>

                <!-- Вкладка "Корзина" -->
                <div class="content-section" id="cart-section">
                    <div class="section-header">
                        <h2>Корзина</h2>
                    </div>
                    <div class="cart-container" id="cart-container">
                        <!-- Товары в корзине будут загружаться с сервера -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Модальное окно для редактирования -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h2>Редактировать информацию</h2>
            <input type="text" id="editValue" placeholder="Введите новое значение">
            <div class="modal-buttons">
                <button id="saveBtn">Сохранить</button>
                <button id="cancelBtn">Отмена</button>
            </div>
        </div>
    </div>
    <script src="../js/profile.js"></script> <!-- ✅ Путь к JS -->
</body>
</html>