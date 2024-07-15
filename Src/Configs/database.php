<?php

return [

    'pdo' => [
        'driver' => 'pgsql',
        'host' => '172.17.0.7',
        'db_name' => 'postgres',
        'db_username' => 'postgres',
        'db_user_password' => 'postgres',
        'default_fetch' => PDO::FETCH_OBJ,
    ],
    'mysqli' => [
        'host' => 'localhost',
        'db_name' => 'bug_app',
        'db_username' => 'root',
        'db_user_password' => '',
        'default_fetch' => MYSQLI_ASSOC,
    ],
];
