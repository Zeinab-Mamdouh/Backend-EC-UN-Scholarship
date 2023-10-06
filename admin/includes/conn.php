<?php
$servername = "sql201.infinityfree.com";
$username = "if0_35174096";
$password = "eErtQwwDKwT";

try{
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;port=80;dbname=if0_35174096_cars", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?><?php
$servername = "sql201.infinityfree.com";
$username = "if0_35174096";
$password = "eErtQwwDKwT";

try{
    $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conn = new PDO("mysql:host=$servername;port=80;dbname=if0_35174096_cars", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>
