<?php
    $dsn = 'mysql:host=localhost;dbname=althdb';
    $username = 'root';
    $password = 'root';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('dberror.php');
        exit();
    }
?>