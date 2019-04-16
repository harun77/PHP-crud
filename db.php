<?php 

$dsn = "mysql:host=localhost;dbname=testphp";
$username = "root";
$password = "";
$options = [];

try{
    $connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e){
    echo "Database connection error!";
}

?>