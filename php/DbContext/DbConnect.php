<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "koreangame";
    $con  = new mysqli($server, $user, $password, $database);
    if(mysqli_connect_errno()){
        echo "DB CONNECTING ERROR";
        exit;
    }      
  
?>