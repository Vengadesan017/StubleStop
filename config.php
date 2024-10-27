<?php


$serverName = "localhost";
$database = "Stubble_Solve";
$username = "root";
$password = "123456";

try{


    $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!$conn){echo "connection faild";}
        }

catch(PDOException $e){
    echo $e->getMessage();
}
?>
