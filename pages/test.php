<?php
session_start();
echo "<h1>Страница Test загружена!</h1>";
echo "<p>Текущая сессия: " . (isset($_SESSION['uid']) ? 'авторизован' : 'не авторизован') . "</p>";
echo "<p>GET-параметр page: " . htmlspecialchars($_GET['page'] ?? 'не задан') . "</p>";
?>
<a href="?page=index">На главную</a> | 
<a href="?page=profile">Профиль</a> | 
<a href="?page=auth">Авторизация</a>