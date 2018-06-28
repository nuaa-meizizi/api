<?php 


return [
    'medoo' => [
    'database_type' => 'mysql',
    'database_name' => 'fuckme',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
	'charset' => 'utf8',
	'port' => 3306,
	'prefix' => '',
	//'socket' => '/tmp/mysql.sock',
    ],
    'redis' => [
        'type' => '', //unix
        'socket' => '', //unix对应
        'host' => '127.0.0.1',
        'port' => '6379',
        'timeout' => 300,
        'prefix' => 'phalapi:',
        'auth' => '',
        'db' => 0
    ],
    'pythonPath' => '/var/www/html/eye_model/',
    'py3Path' => '/usr/local/python3/bin/python3.6'
];
