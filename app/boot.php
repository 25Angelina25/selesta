<?php
function pdo(): PDO
{
    static $pdo;

    if(!$pdo) {
        $config = include __DIR__ . '/config.php';
        $dsn = 'mysql:dbname=' . $config['DB_NAME'] . ';host=' . $config['DB_HOST'];
        $pdo = new PDO($dsn, $config['DB_USER'],$config['DB_PASS']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

?>