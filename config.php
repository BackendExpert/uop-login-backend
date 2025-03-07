<?php 

    $host = 'localhost';
    $dbname = 'uop_db';
    $username = 'root';
    $password = '1234';
    $secret_key = 'your_secret_key';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

?>