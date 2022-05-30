<?php

return [

    'database' => [
        'name' => 'dagafuel',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],

    'APP_NAME' => 'DagaFuel',

];
