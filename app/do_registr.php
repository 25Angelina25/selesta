<?php
session_start();
require_once __DIR__ . '/boot.php';

// Проверяем, есть ли уже такой логин или email
$stmt = pdo()->prepare("SELECT * FROM users WHERE login = ? OR email = ?");
$stmt->execute([
    $_POST['login'],
    $_POST['email']
]);

if ($stmt->rowCount() > 0) {
    $_SESSION['alert']['error'] = "Такой логин или почта уже зарегистрированы!";
    header('Location: ../reg.php');
    exit;
}

// Хешируем пароль перед сохранением
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Регистрируем нового пользователя
$stmt1 = pdo()->prepare("INSERT INTO users (login, email, number, password) VALUES (?, ?, ?, ?)");
$stmt1->execute([
    $_POST['login'],
    $_POST['email'],
    $_POST['number'],
    $hashedPassword, // ⭐ Сохраняем хеш, а не пароль
]);

// Получаем ID нового пользователя
$userId = pdo()->lastInsertId();

// Сохраняем в сессии
$_SESSION['uid'] = $userId;
$_SESSION['login'] = $_POST['login'];
$_SESSION['alert']['success'] = "Успешная регистрация!";

header('Location: ../index.php');
exit;

?>