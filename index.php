<?php
session_start();

try {
    // Берем переданный роут
    $route = trim($_REQUEST['route'] ?? 'index');

    // Проверяем, если в конце слеш, то это index роут
    if (substr($route, -1) === '/') {
        $route .= 'index';
    }

    // Минимальная защита от инклуда неожидаемых файлов
    if (!preg_match('~^[-a-z0-9_/]+$~i', $route)) {
        throw new Exception('Not allowed route');
    }

    // Проверяем, является ли роут защищённой страницей
    $protectedPages = ['profile'];
    $isAuthenticated = isset($_SESSION['uid']);

    if (in_array($route, $protectedPages) && !$isAuthenticated) {
        header('Location: auth');
        exit;
    }

    // Генерим путь к файлу
    $filePath = __DIR__ . '/pages/' . $route . '.php';

    // Если не существует — ищем index.php в папке
    if (!file_exists($filePath)) {
        $route .= '/index';
        $filePath = __DIR__ . '/pages/' . $route . '.php';
    }

    // Если всё равно не существует — 404
    if (!file_exists($filePath)) {
        throw new Exception('Route not found');
    }

    // Подключаем файл
    include $filePath;

} catch (Throwable $ex) {
    // Показываем 404
    include __DIR__ . '/pages/404.php';
}