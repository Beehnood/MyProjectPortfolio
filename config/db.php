<?php

define('DB_HOST','localhost');
define('DB_USER','behnood');
define('DB_PASS','12345678');
define('DB_NAME','behnood');

try {
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $conn -> exec('SET NAMES utf8');
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✔️ connecting to databse is successful";
} catch (PDOException $e) {
    echo "❌ ERROR : failed o connect to databse. error message : " . $e -> getMessage();
}

?>