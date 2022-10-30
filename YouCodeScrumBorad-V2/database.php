<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $DBname     = "youcodeboard";

    //CONNECT TO MYSQL DATABASE USING MYSQLI    
    $GLOBALS['connection']  = mysqli_connect($servername, $username, $password, $DBname);

    // Check connection
    if (!$connection   ) {
    die("Connection failed: " . mysqli_connect_error());
    } 
    
    
?>