<?php

$dsn = 'mysql:host=mariadb;dbname=test_ajwad';
$username = 'root';
$password = '';

try {
    // connect to mysql
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Not Connected ' . $ex->getMessage();
}
?>