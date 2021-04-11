<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'productivity';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }


/*
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'productivity'
);

if (isset($conn)) {
    echo 'DB is connected';

}

*/

