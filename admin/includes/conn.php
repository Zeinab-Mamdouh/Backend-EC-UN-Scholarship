<?php
$servername = "localhost";
$username = "id21363937_root";
$password = "Zozo123456@";

try{
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;port=21;dbname=id21363937_zeinab", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>
