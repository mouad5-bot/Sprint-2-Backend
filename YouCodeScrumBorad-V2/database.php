<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $DBname   = "youcodeboard";

    //CONNECT TO MYSQL DATABASE USING MYSQLI    
    $conn = mysqli_connect($servername, $username, $password, $DBname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }   
    
?>