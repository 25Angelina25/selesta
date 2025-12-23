<?php
session_start();
session_unset();
session_destroy();

// Перенаправляем на главную
header("Location: ../index.php");
exit;