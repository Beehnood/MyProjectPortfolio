<?php


$servername = "localhost";
$username = "behnood";
$password = "12345678";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Ben_Portfolio", $username, $password);

    if(! $conn ) {
        echo' could not connect';
        die;
    }
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch
(PDOException $e) {
   echo 'Connection failed: '. $e->getMessage();

} 
    ?>
