<?php
    $dsn = 'mysql:host=localhost;dbname=altmess';
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