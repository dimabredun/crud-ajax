<?php

include "config.php";

$pdo->exec('DROP TABLE IF EXISTS user;');
$pdo->exec('CREATE TABLE user (
    id     int(11) auto_increment  primary key,
    name   varchar(255)      null,
    role   varchar(255)      null,
    status tinyint default 0 null
)');

$pdo->exec('INSERT INTO user
    (name, role, status) VALUES
    ("Adam Cotter", "user", 1)'
);

$pdo->exec('INSERT INTO user
    (name, role, status) VALUES
    ("Pauline Noble", "user", 0)'
);

$pdo->exec('INSERT INTO user
    (name, role, status) VALUES
    ("Sherilyn Metzel", "admin", 1)'
);

$pdo->exec('INSERT INTO user
    (name, role, status) VALUES
    ("Terrie Boaler", "admin", 0)'
);

$pdo->exec('INSERT INTO user
    (name, role, status) VALUES
    ("Rutter Pude", "user", 1)'
);
