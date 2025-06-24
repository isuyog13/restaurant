<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "restaurant_db";

    $conn = new mysqli($server, $user, $password, $dbname);
    if(!$conn){
        echo "error!: {$conn->connect_error}";
    }
    
    
?>