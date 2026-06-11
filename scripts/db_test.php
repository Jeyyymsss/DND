<?php

$host = '127.0.0.1';
$port = 3306;
$user = 'root';
$pass = '';
$db   = 'laravel';

try {
    new PDO("mysql:host=$host;port=$port", $user, $pass);
    echo "SERVER_OK\n";
} catch (Exception $e) {
    echo "SERVER_ERROR: " . $e->getMessage() . "\n";
}

try {
    new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    echo "DB_OK\n";
} catch (Exception $e) {
    echo "DB_ERROR: " . $e->getMessage() . "\n";
}
