<?php

$configuration = [
     'dsn' => 'mysql:host=127.0.0.1;dbname=user;charset=utf8mb4',
     'user' => 'user_record',
     'password' => 'Pass*001'
];

try {
    $pdo = new PDO($configuration['dsn'],$configuration['user'], $configuration['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $exception) {
    echo 'Error. '. $exception->getMessage();
}
