<?php
session_start();
require_once __DIR__ . '/boot.php';

// Получаем пользователя по логину
$stmt = pdo()->prepare("SELECT * FROM users WHERE login = ?");
$stmt->execute([$_POST['login']]);
$user = $stmt->fetch();

// Проверяем, существует ли пользователь и совпадает ли пароль
if (!$user || !password_verify($_POST['password'], $user['password'])) {
    $_SESSION['alert']['error'] = "Неверный логин или пароль!";
    header('Location: ../auth.php');
    exit;
}

// Авторизация успешна
$_SESSION['uid'] = $user["id"];
$_SESSION['login'] = $user["login"];

header('Location: ../index.php');
exit;
?>