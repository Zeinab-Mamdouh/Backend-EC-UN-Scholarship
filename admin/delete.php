<?php
include_once("includes/logged.php");

if(isset($_GET["id"])){
    include_once("includes/conn.php");
    $id = $_GET["id"];
    try{
        $data = "DELETE FROM `cars` WHERE id = ?";
        $result = $conn->prepare($data);
        $result->execute([$id]);
        echo "Deleted Successfully";
    
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    }
else{
    echo "Invalid Request";
}
?>