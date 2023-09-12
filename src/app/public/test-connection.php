<?php

use Doctrine\DBAL\DriverManager;

require __DIR__ . '/../vendor/autoload.php';

try {
    $connectionParams = [
        'dbname' => $_SERVER['POSTGRES_DB'],
        'user' => $_SERVER['POSTGRES_USER'],
        'password' => $_SERVER['POSTGRES_PASSWORD'],
        'host' => $_SERVER['POSTGRES_HOST'],
        'driver' => 'pdo_pgsql',
    ];

    $conn = DriverManager::getConnection($connectionParams);

    $sql = 'SELECT 1 + 2 AS sum';
    $stmt = $conn->query($sql);

    while (($row = $stmt->fetchAssociative()) !== false) {
        echo $row['sum'];
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
